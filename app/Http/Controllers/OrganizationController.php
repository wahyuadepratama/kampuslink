<?php

namespace App\Http\Controllers;

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

    public function home($name)
    {
      $id = base64_decode(base64_decode($name));
      $admin = UserOrganization::where('user_id', Auth::user()->id)->where('organization_id', $id)->get();

      if($admin->isEmpty()){
        return abort(404);
      }

      $organization = Organization::where('id',$id)->first();
      $event = Event::where('organization_id', $id)->get();
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
                                      ->with('name', $organization->name);
    }

    public function profile($name)
    {
      return view('organization/profile');
    }

    public function saveProfile(Request $request)
    {
      $this->validate($request,[
        'name' => 'required',
        'phone' => 'required|max:15',
        'description' => 'required'
      ]);

      $userOrganization = UserOrganization::where('user_id', Auth::user()->id)->first();
      $organization = Organization::where('id', $userOrganization->organization_id)->first();
      $organization->name = $request->name;
      $organization->phone = $request->phone;
      $organization->instagram = $request->instagram;
      $organization->facebook = $request->facebook;
      $organization->line = $request->line;
      $organization->whatsapp = $request->whatsapp;
      $organization->description = $request->description;
      $organization->save();

      return back()->with('success', 'Kamu Berhasil Memperbarui Data Organisasi');
    }

    public function event()
    {
      $organization = UserOrganization::where('user_id', Auth::user()->id)->first();

      if(isset($_GET['search'])){
        if($_GET['search'] == "all-big-event"){
          $event = Event::where('organization_id', $organization->organization_id)->where('status', 1)->get();
          return view('organization/event')->with('event', $event);
        }
        if($_GET['search'] == "all-event"){
          $event = Event::where('organization_id', $organization->organization_id)->where('status', 1)->get();
          $subEvent = [];
          foreach($event as $key){
            $subEvent = array_merge($subEvent, SubEvent::where('status', 'ongoing')->where('event_id', $key->id)->get()->toArray() );
          }
          return view('organization/event')->with('subEvent', $subEvent)->with('oldSearch', ['name' => 'Semua Event', 'value' => 'all-event']);
        }
        if($_GET['search'] == "event-approved"){
          $event = Event::where('organization_id', $organization->organization_id)->where('status', 1)->get();
          $subEvent = [];
          foreach($event as $key){
            $subEvent = array_merge($subEvent, SubEvent::where('status', 'ongoing')->where('approved', 1)->where('event_id', $key->id)->get()->toArray() );
          }
          return view('organization/event')->with('subEvent', $subEvent)->with('oldSearch', ['name' => 'Event yang Sudah Disetujui', 'value' => 'event-approved']);
        }
        if($_GET['search'] == "event-pending"){
          $event = Event::where('organization_id', $organization->organization_id)->where('status', 1)->get();
          $subEvent = [];
          foreach($event as $key){
            $subEvent = array_merge($subEvent, SubEvent::where('status', 'ongoing')->where('approved', 0)->where('event_id', $key->id)->get()->toArray() );
          }
          return view('organization/event')->with('subEvent', $subEvent)->with('oldSearch', ['name' => 'Event yang Pending', 'value' => 'event-pending']);
        }
        if($_GET['search'] == "event-reject"){
          $event = Event::where('organization_id', $organization->organization_id)->where('status', 1)->get();
          $subEvent = [];
          foreach($event as $key){
            $subEvent = array_merge($subEvent, SubEvent::where('status', 'ongoing')->where('approved', 2)->where('event_id', $key->id)->get()->toArray() );
          }
          return view('organization/event')->with('subEvent', $subEvent)->with('oldSearch', ['name' => 'Event yang Ditolak', 'value' => 'event-reject']);
        }
        if($_GET['search'] == "event-past"){
          $event = Event::where('organization_id', $organization->organization_id)->where('status', 1)->get();
          $subEvent = [];
          foreach($event as $key){
            $subEvent = array_merge($subEvent, SubEvent::where('status', 'past')->where('event_id', $key->id)->get()->toArray() );
          }
          return view('organization/event')->with('subEvent', $subEvent)->with('oldSearch', ['name' => 'Event yang Sudah Berlalu', 'value' => 'event-past']);
        }
      }else{
        $event = Event::where('organization_id', $organization->organization_id)->get();
        return view('organization/event')->with('event', $event);
      }
    }

    public function addBigEvent(Request $request)
    {
      return view('organization/big_event_add');
    }

    public function storeBigEvent(Request $request)
    {
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

      Event::create([
        'organization_id' => $organization->organization_id,
        'name' => $request->name,
        'description' => $request->description,
        'photo' => $filename,
        'start_date' => $start_date,
        'end_date' => $end_date,
        'web_link' => $request->web_link,
        'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
      ]);

      return back()->with('message', 'Kamu berhasil menambahkan sebuah Big Event. Cek <a href="/organization/event"> disini </a>');
    }

    public function addEvent()
    {
      return view('organization/event_add');
    }

    public function storeEvent(Request $request)
    {
      $date = Carbon::parse($request->date)->format('Y-m-d');

      // Cek apakah nama event sudah ada
      $checkName = SubEvent::where('name', $request->name)->first();
      if($checkName){
        return back()->withInput()->with('judul', 'Event dengan nama ini sudah ada, coba gunakan nama lain');
      }
      // End Cek

      // Cek apakah event merupakan bagian dari Big Event
      if ($request->event_id == "0") {
        $organization = UserOrganization::where('user_id', Auth::user()->id)->first();
        $event = Event::create([
          'organization_id' => $organization->organization_id,
          'status' => 0,
          'name' => $request->name,
          'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ]);
        $event['id'] = $event->id;
      }else{
        $event['id'] = $request->event_id;
      }
      // End Cek

      $thumbnail      = $request->file('photo');
      $filename      = 'event_' . str_slug($request->name).'_'.time() . '.' . $thumbnail->getClientOriginalExtension();

      $small          = 'storage/poster/_small/' . $filename;
      $createSmall   = Image::make($thumbnail)->resize(25, 35)->save($small);

      $medium          = 'storage/poster/_medium/' . $filename;
      $createMedium   = Image::make($thumbnail)->resize(210, 297)->save($medium);

      $large          = 'storage/poster/_large/' . $filename;
      $createLarge   = Image::make($thumbnail)->resize(794, 1123)->save($large);

      $subEvent = SubEvent::create([
        'event_id' => $event['id'],
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

      return back()->with('message', 'Kamu berhasil menambahkan sebuah Event. Cek <a href="/organization/event?search=all-event"> disini </a>');
    }

    public function searchEvent($slug)
    {
      $subEvent = SubEvent::where('slug', $slug)->first();
      return view('organization/event_detail')->with('sub_event', $subEvent);
    }
}
