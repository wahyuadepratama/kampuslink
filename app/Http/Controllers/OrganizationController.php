<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\UserOrganization;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Organization;
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

    public function home()
    {
      $organization = UserOrganization::where('user_id', Auth::user()->id)->first();

      $admin = UserOrganization::with('user')->where('organization_id', $organization->organization_id)->get();
      $event = Event::where('organization_id', $organization->organization_id)->get();
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
                                      ->with('subEvent', $subEvent);
    }

    public function profile()
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
      $event = Event::where('organization_id', $organization->organization_id)->get();

      $subEvent = [];
      foreach($event as $key){
        $subEvent = array_merge($subEvent, SubEvent::where('status', 'ongoing')->where('event_id', $key->id)->get()->toArray() );
      }      

      return view('organization/event')->with('subEvent', $subEvent);
    }

    public function addEvent()
    {
      return "halaman add event";
    }
}
