<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Auth;
use App\Models\UserOrganization;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Organization;
use App\Models\SubEventTicket;
use App\Models\SubEvent;
use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;

class OrganizationController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
      $this->middleware('admin');
    }

    public function checkOrganization($ig)
    {
      $organization = Organization::where('instagram',$ig)->first();
      if(!isset($organization)){
        return abort(404);
      }else{
        $admin = UserOrganization::where('user_id', Auth::user()->id)->where('organization_id', $organization->id)->first();
        if(!isset($admin)){
          return abort(404); //cuztome halamannyanya disini
        }else{
          return $organization;
        }
      }
    }

    public function home($ig)
    {
      $check = $this->checkOrganization($ig);

      $admin = UserOrganization::where('organization_id', $check->id)->get();

      $event = Event::where('organization_id', $check->id)->get();
      $countEvent = count($event);

      $countSubEventOngoing = 0;
      $countSubEventPast = 0;
      $subEvent = [];
      foreach($event as $key){
        $countSubEventOngoing = $countSubEventOngoing + count(SubEvent::where('status', 'ongoing')->where('event_id', $key->id)->get());
        $countSubEventPast = $countSubEventPast + count(SubEvent::where('status', 'past')->where('event_id', $key->id)->get());
        $subEvent = array_merge($subEvent, SubEvent::where('status', 'ongoing')->where('event_id', $key->id)->get()->toArray() );
      }

      return view('organization/home')->with('admin', $admin)
                                      ->with('countEvent', $countEvent)
                                      ->with('countSubEventOngoing', $countSubEventOngoing)
                                      ->with('countSubEventPast', $countSubEventPast)
                                      ->with('subEvent', $subEvent)
                                      ->with('organization', $check);
    }

    public function profile($ig)
    {
      $check = $this->checkOrganization($ig);
      return view('organization/profile')->with('organization', $check);
    }

    public function saveProfile(Request $request, $ig)
    {
      $this->validate($request,[
        'name' => 'required',
        'phone' => 'required|max:15|unique:users',
        'description' => 'required',
        'cover' => 'mimes:jpeg,jpg,png|max:5000'
      ]);

      $organization = Organization::where('instagram', $ig)->first();

      if (isset($request->cover)) {
        if(file_exists(public_path('storage/cover/'. $organization->photo_cover))){
          unlink(public_path('storage/cover/'. $organization->photo_cover));
        }
        $thumbnail      = $request->file('cover');
        $filename      = 'cover_' . str_slug($request->name).'_'.time() . '.' . $thumbnail->getClientOriginalExtension();
        $small          = 'storage/cover/' . $filename;
        $createSmall   = Image::make($thumbnail)->resize(300, 300)->save($small);
      }else{
        $filename = $organization->photo_cover;
      }

      $organization->name = $request->name;
      $organization->phone = $request->phone;
      $organization->facebook = $request->facebook;
      $organization->line = $request->line;
      $organization->whatsapp = $request->whatsapp;
      $organization->description = $request->description;
      $organization->photo_cover = $filename;
      $organization->save();

      return back()->with('success', 'Kamu Berhasil Memperbarui Data Organisasi');
    }

    public function event($ig)
    {
      $check = $this->checkOrganization($ig);

      if(isset($_GET['search'])){
        if($_GET['search'] == "all-big-event"){
          $event = Event::where('organization_id', $check->id)->get();
          return view('organization/event')->with('event', $event)->with('organization', $check);
        }
        if($_GET['search'] == "all-event"){
          $subEvent = SubEvent::where('organization_id', $check->id)->get();
          return view('organization/event')->with('subEvent', $subEvent)->with('oldSearch', ['name' => 'Semua Event', 'value' => 'all-event'])->with('organization', $check);
        }
        if($_GET['search'] == "event-approved"){
          $subEvent = SubEvent::where('approved', 1)->where('organization_id', $check->id)->get();
          return view('organization/event')->with('subEvent', $subEvent)->with('oldSearch', ['name' => 'Event yang Sudah Disetujui', 'value' => 'event-approved'])->with('organization', $check);
        }
        if($_GET['search'] == "event-pending"){
          $subEvent = SubEvent::where('approved', 0)->where('organization_id', $check->id)->get();
          return view('organization/event')->with('subEvent', $subEvent)->with('oldSearch', ['name' => 'Event yang Sudah Disetujui', 'value' => 'event-approved'])->with('organization', $check);
        }
        if($_GET['search'] == "event-reject"){
          $subEvent = SubEvent::where('approved', 2)->where('organization_id', $check->id)->get();
          return view('organization/event')->with('subEvent', $subEvent)->with('oldSearch', ['name' => 'Event yang Sudah Disetujui', 'value' => 'event-approved'])->with('organization', $check);
        }
        if($_GET['search'] == "event-past"){
          $subEvent = SubEvent::where('status', 'past')->where('organization_id', $check->id)->get();
          return view('organization/event')->with('subEvent', $subEvent)->with('oldSearch', ['name' => 'Event yang Sudah Disetujui', 'value' => 'event-approved'])->with('organization', $check);
        }
      }else{
        $event = Event::where('organization_id', $check->id)->get();
        return view('organization/event')->with('event', $event)->with('organization', $check);
      }
    }

    public function addBigEvent(Request $request, $ig)
    {
      $check = $this->checkOrganization($ig);
      if(Auth::user()->checkRoleUserOrganization($check->id) == "Anggota"){
        return abort(404);
      }
      return view('organization/big_event_add')->with('organization', $check);
    }

    public function storeBigEvent(Request $request, $ig)
    {
      $check = $this->checkOrganization($ig);
      if(Auth::user()->checkRoleUserOrganization($check->id) == "Anggota"){
        return abort(404);
      }

      $this->validate($request,[
        'name' => 'required|unique:event',
        'description' => 'required',
        'photo' => 'mimes:jpeg,jpg,png|max:5000',
        'start_date' => 'required',
        'end_date' => 'required'
      ]);

      $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
      $end_date = Carbon::parse($request->end_date)->format('Y-m-d');
      $organization = UserOrganization::where('user_id', Auth::user()->id)->first();

      $thumbnail      = $request->file('photo');
      $filename      = 'big_event_' . str_slug($request->name).'_'.time() . '.' . $thumbnail->getClientOriginalExtension();

      $small          = 'storage/poster/_small/' . $filename;
      $createSmall   = Image::make($thumbnail)->resize(25, 35)->save($small);

      $medium          = 'storage/poster/_medium/' . $filename;
      $createMedium   = Image::make($thumbnail)->resize(210, 297)->save($medium);

      $large          = 'storage/poster/_large/' . $filename;
      $createLarge   = Image::make($thumbnail)->resize(794, 1123)->save($large);

      $qr = $_SERVER['SERVER_NAME'] . '/event' . '/' . str_slug($request->name);
      $qrResult = QrCode::size(500)->generate($qr, 'storage/qr/event/'. 'big_event_'. str_slug($request->name) . '.jpg');

      Event::create([
        'organization_id' => $organization->organization_id,
        'name' => $request->name,
        'slug' => str_slug($request->name),
        'description' => $request->description,
        'qr_code' => str_slug($request->name) . '.jpg',
        'photo' => $filename,
        'start_date' => $start_date,
        'end_date' => $end_date,
        'web_link' => $request->web_link,
        'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
      ]);

      return back()->with('message', 'Kamu berhasil menambahkan sebuah Big Event. Cek <a href="/organization/'. $check->instagram .'/event"> <b>disini</b> </a>');
    }

    public function addEvent($ig)
    {
      $check = $this->checkOrganization($ig);
      if(Auth::user()->checkRoleUserOrganization($check->id) == "Anggota"){
        return abort(404);
      }
      return view('organization/event_add')->with('organization', $check);
    }

    public function storeEvent(Request $request, $ig)
    {
      $check = $this->checkOrganization($ig);
      if(Auth::user()->checkRoleUserOrganization($check->id) == "Anggota"){
        return abort(404);
      }

      $this->validate($request,[
        'name' => 'required|unique:sub_event',
        'description' => 'required',
        'photo' => 'mimes:jpeg,jpg,png|max:5000',
        'location' => 'required',
        'start_time' => 'required',
        'end_time' => 'required'
      ]);

      // Cek apakah event merupakan bagian dari Big Event
      if ($request->event_id == "0") {
        $event['id'] = NULL;
      }else{
        $event['id'] = $request->event_id;
      }
      // End Cek

      $date = Carbon::parse($request->date)->format('Y-m-d');

      $thumbnail      = $request->file('photo');
      $filename      = 'event_' . str_slug($request->name).'_'.time() . '.' . $thumbnail->getClientOriginalExtension();

      $small          = 'storage/poster/_small/' . $filename;
      $createSmall   = Image::make($thumbnail)->resize(25, 35)->save($small);

      $medium          = 'storage/poster/_medium/' . $filename;
      $createMedium   = Image::make($thumbnail)->resize(210, 297)->save($medium);

      $large          = 'storage/poster/_large/' . $filename;
      $createLarge   = Image::make($thumbnail)->resize(794, 1123)->save($large);

      $qr = $_SERVER['SERVER_NAME'] . '/event' . '/' . str_slug($request->name);
      $qrResult = QrCode::size(500)->generate($qr, 'storage/qr/event/'. 'event_'. str_slug($request->name) . '.jpg');

      $subEvent = SubEvent::create([
        'event_id' => $event['id'],
        'organization_id' => $check->id,
        'name' => $request->name,
        'slug'=> str_slug($request->name),
        'description' => $request->description,
        'location' => $request->location,
        'whatsapp' => $request->whatsapp,
        'line' => $request->line,
        'qr_code' => $request->qr_code,
        'status' => 'ongoing',
        'start_time' => $request->start_time,
        'end_time' => $request->end_time,
        'date' => $date,
        'photo' => $filename,
        'web_link' => $request->web_link,
        'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
      ]);

      if(isset($request->reguler_total) && isset($request->reguler_price)){
        SubEventTicket::create([
          'sub_event_id' => $subEvent->id,
          'type' => 'Reguler',
          'price' => $request->reguler_price,
          'stock' => $request->reguler_total
        ]);
      }

      if(isset($request->vip_total) && isset($request->vip_price)){
        SubEventTicket::create([
          'sub_event_id' => $subEvent->id,
          'type' => 'VIP',
          'price' => $request->reguler_price,
          'stock' => $request->reguler_total
        ]);
      }

      return back()->with('message', 'Kamu berhasil menambahkan sebuah Event. Cek <a href="/organization/'. $check->instagram .'/event?search=all-event"> disini </a>');
    }

    public function indexMember($ig)
    {
      $check = $this->checkOrganization($ig);
      return view('organization/member')->with('organization', $check);
    }

    public function showEvent($ig, $slug)
    {
      $check = $this->checkOrganization($ig);
      $subEvent = SubEvent::where('slug', $slug)->first();
      return view('organization/event_detail')->with('organization', $check)->with('sub_event', $subEvent);
    }

    public function showBigEvent($ig, $slug)
    {
      $check = $this->checkOrganization($ig);
      $bigEvent = Event::where('slug', $slug)->first();
      return view('organization/big_event_detail')->with('organization', $check)->with('big_event', $bigEvent);
    }
}
