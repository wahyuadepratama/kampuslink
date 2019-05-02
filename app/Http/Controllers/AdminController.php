<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\SubEvent;
use App\Models\Campus;
use App\Models\Event;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image as Image;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('super.admin');
    }

    public function index()
    {
      $userVerified = User::where('status', 1)->orderBy('created_at','desc')->get();
      $userNotVerified = User::where('status', 0)->orderBy('created_at','desc')->get();
      $subEvent = SubEvent::where('approved', 1)->orderBy('created_at','desc')->get();
      $eventOngoing = SubEvent::with('event')->where('approved', 1)->where('status','ongoing')->orderBy('created_at','desc')->get();
      $eventPast = SubEvent::with('event')->where('approved', 1)->where('status','past')->orderBy('created_at','desc')->get();
      $bigEvent = Event::where('approved', 1)->orderBy('created_at','desc')->get();
      $requestBigEvent = Event::where('approved', 0)->orderBy('created_at','desc')->get();
      $requestEvent = SubEvent::where('approved', 0)->where('status','ongoing')->orderBy('created_at','desc')->get();
      $transactionWaitingPayment = Transaction::where('status', 'Menunggu Pembayaran')->orderBy('created_at','desc')->get();
      $transactionProcess = Transaction::where('status', 'Diproses')->orderBy('created_at','desc')->get();
      $transactionSuccess = Transaction::where('status', 'Pembayaran Berhasil')->orderBy('created_at','desc')->get();
      $transactionReject = Transaction::where('status', 'Pembayaran Dibatalkan')->orWhere('status', 'Ditolak')->orderBy('created_at','desc')->get();

      return view('admin/index')->with('eventOngoing', $eventOngoing)
                                ->with('eventPast', $eventPast)
                                ->with('subEvent', $subEvent)
                                ->with('userVerified', $userVerified)
                                ->with('userNotVerified', $userNotVerified)
                                ->with('requestBigEvent', $requestBigEvent)
                                ->with('requestEvent', $requestEvent)
                                ->with('transactionWaitingPayment', $transactionWaitingPayment)
                                ->with('transactionProcess', $transactionProcess)
                                ->with('transactionSuccess', $transactionSuccess)
                                ->with('transactionReject', $transactionReject)
                                ->with('bigEvent', $bigEvent);
    }

    public function indexCampus()
    {
      $data = Campus::all();
      return view('admin/campus')->with('data', $data);
    }

    public function destroyCampus($id)
    {
      $campus = Campus::find($id);
      $campus->delete();
      return back()->with('success', 'Soft delete campus successful!');
    }

    public function updateCampus(Request $request, $id)
    {
      $this->validate($request,[
        'name' => 'required',
        'location' => 'required',
        'description' => 'required',
        'background_color' => 'required'
      ]);

      $campus = Campus::find($id);

      if(isset($request->logo)){
        if($campus->logo != 'default.png' && file_exists(public_path('storage/university/'. $campus->logo))){
          unlink(public_path('storage/university/'. $campus->logo));
        }
        $thumbnail     = $request->file('logo');
        $filename      = 'logo_' . str_slug($request->name).'_'.time() . '.' . $thumbnail->getClientOriginalExtension();
        $small         = 'storage/university/' . $filename;
        $createSmall   = Image::make($thumbnail)->save($small);
      }

      $campus = Campus::find($id);
      $campus->name = $request->name;
      $campus->location = $request->location;
      $campus->description = $request->description;
      $campus->background_color = $request->background_color;
      $campus->logo = $filename;
      $campus->save();

      return back()->with('success', 'Update data successful!');
    }

    public function storeCampus(Request $request)
    {
      $this->validate($request,[
        'name' => 'required',
        'location' => 'required',
        'description' => 'required',
        'background_color' => 'required'
      ]);

      if(isset($request->logo)){
        $thumbnail     = $request->file('logo');
        $filename      = 'logo_' . str_slug($request->name).'_'.time() . '.' . $thumbnail->getClientOriginalExtension();
        $small         = 'storage/university/' . $filename;
        $createSmall   = Image::make($thumbnail)->save($small);
      }else{
        $filename = 'default.png';
      }

      Campus::create([
        'name' => $request->name,
        'logo' => $filename,
        'location' => $request->location,
        'description' => $request->description,
        'background_color' => $request->background_color,
      ]);

      return back()->with('success', 'New data successfull added!');
    }

}
