<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\SubEvent;
use App\Models\EventCategory;
use App\Models\Organization;
use App\Models\Viewer;
use App\Models\EventViewer;
use App\Models\Category;
use App\Models\Campus;
use Carbon\Carbon;

class GuestController extends Controller
{
    public function index()
    {
      $this->checkDueEvent();
      $subEvents = SubEvent::with('event')->where('approved', 1)->where('status','ongoing')
                            ->orderBy('created_at','desc')
                            ->take(10)
                            ->get();

      $subEventRatings  = EventViewer::join('sub_event','event_viewer.sub_event_id','=','sub_event.id')
                                      ->select('sub_event_id', DB::raw('count(*) as total'))
                                      ->where('sub_event.status','ongoing')
                                      ->groupBy('sub_event_id')
                                      ->orderBy('total','desc')
                                      ->take(3)
                                      ->get();

      $subEventRatings2  = EventViewer::join('sub_event','event_viewer.sub_event_id','=','sub_event.id')
                                      ->select('sub_event_id', DB::raw('count(*) as total'))
                                      ->where('sub_event.status','ongoing')
                                      ->groupBy('sub_event_id')
                                      ->orderBy('total','desc')
                                      ->take(10)
                                      ->get();

      $categories = Category::orderBy('name')->get();

      return view('guest.index')->with('subEvents', $subEvents)
                                ->with('subEventRatings', $subEventRatings)
                                ->with('categories', $categories)
                                ->with('subEventRatings2', $subEventRatings2);
    }

    public function checkDueEvent()
    {
      $subEvents = SubEvent::with('event')->where('approved', 1)->where('status','ongoing')->get();
      foreach ($subEvents as $subEvent) {
        if (strtotime($subEvent->date) < strtotime(Carbon::now()->toDateString())) {
          $data = SubEvent::where('id', $subEvent->id)->first();
          $data->status = 'past';
          $data->save();
        }
      }
    }

    public function indexEvent()
    {
      $this->checkDueEvent();
      $subEvents  = SubEvent::with('event')->where('approved', 1)->where('status','ongoing')->orderBy('created_at','desc')->paginate(12);
      $categories = Category::orderBy('name','asc')->get();
      $campus     = Campus::orderBy('name','asc')->get();
      $organizations = Organization::orderBy('name','asc')->get();

      return view('guest.event')->with('subEvents', $subEvents)
                                ->with('categories', $categories)
                                ->with('campus',$campus)
                                ->with('organizations', $organizations);
    }

    public function showEvent($slug)
    {
      $viewers = Viewer::all();
      $subEvent = SubEvent::where('slug', $slug)->first();

      $found = false;
      foreach ($viewers as $key) {
        if($key->ip_address == $_SERVER['REMOTE_ADDR']){
          $viewerId   = $key->id;
          $viewerDate = $key->last_view;
          $found      = true;
        }
      }

      if($found == false){
        $new = Viewer::create([
          'ip_address'  => $_SERVER['REMOTE_ADDR'],
          'last_view'   => Carbon::now()->setTimezone('Asia/Jakarta'),
        ]);

        EventViewer::create([
          'viewer_id'     => $new->id,
          'sub_event_id'  => $subEvent->id,
        ]);
      }else{

        if(\Carbon\Carbon::parse($viewerDate)->format('Y-m-d') != Carbon::now()->toDateString()) {
          $dataNewDay = Viewer::where('ip_address', $_SERVER['REMOTE_ADDR'])->first();
          $dataNewDay->last_view = Carbon::now()->setTimezone('Asia/Jakarta');
          $dataNewDay->save();

          EventViewer::create([
            'viewer_id'     => $viewerId,
            'sub_event_id'  => $subEvent->id,
          ]);
        }

        $eventViewer = EventViewer::where('sub_event_id', $subEvent->id)->where('viewer_id', $viewerId)->first();
        if(!$eventViewer){
          EventViewer::create([
            'viewer_id'     => $viewerId,
            'sub_event_id'  => $subEvent->id,
          ]);
        }
      }

      $viewer     = count(EventViewer::where('sub_event_id', $subEvent->id)->get());
      $categories = EventCategory::where('sub_event_id', $subEvent->id)->get();

      // Suggesstion Event
      $suggestions = SubEvent::where('event_id', $subEvent->id)->inRandomOrder()->limit(10)->get();
      $data = [];
      foreach($suggestions as $key){
        if($key->id != $subEvent->id){
            array_push($data, $key);
        }
      }

      if($data == NULL){
        $suggestions = EventCategory::where('sub_event_id', $subEvent->id)->inRandomOrder()->limit(10)->get();
        $data = [];
        foreach($suggestions as $key){          
          if($key->subEvent->id != $subEvent->id){
              array_push($data, $key);
          }
        }

        if($data == NULL){
          $data = SubEvent::inRandomOrder()->limit(10)->get();
        }
      }

      // End Suggesstion Event

      return view('guest.event_detail')->with('subEvent', $subEvent)
                                      ->with('categories', $categories)
                                      ->with('viewer', $viewer)
                                      ->with('suggestions', $data);
    }

    public function filter($campusId, $organizationId, $categoryId)
    {
      $categories = Category::orderBy('name','asc')->get();
      $campus     = Campus::orderBy('name','asc')->get();
      $organizations = Organization::orderBy('name','asc')->get();

      if ($campusId == "all" && $organizationId == "all" && $categoryId == "all"){

        return redirect('/event');

      }else if ($campusId == "all" && $organizationId == "all"){
        $subEvents = SubEvent::join('event_category','event_category.sub_event_id','=','sub_event.id')
                          ->join('category','category.id','=','event_category.category_id')
                          ->select('sub_event.*', 'category.name as category')
                          ->where('event_category.category_id', $categoryId)
                          ->paginate(12);
        $oldCategory = EventCategory::with('category')->where('category_id', $categoryId)->first();

        return view('guest.event')->with('subEvents', $subEvents)
                                  ->with('categories', $categories)
                                  ->with('campus',$campus)
                                  ->with('organizations', $organizations)
                                  ->with('oldCategoryId', $categoryId)
                                  ->with('oldCategoryName', $oldCategory->category->name);
      }else if ($campusId == "all" && $categoryId == "all"){
        $subEvents = SubEvent::join('event','event.id','=','sub_event.event_id')
                          ->join('organization','organization.id','=','event.organization_id')
                          ->select('sub_event.*')
                          ->where('organization.id', $organizationId)
                          ->paginate(12);

        return view('guest.event')->with('subEvents', $subEvents)
                                  ->with('categories', $categories)
                                  ->with('campus',$campus)
                                  ->with('organizations', $organizations);

      }else if ($organizationId == "all" && $categoryId == "all"){
        $subEvents = SubEvent::join('event','event.id','=','sub_event.event_id')
                          ->join('organization','organization.id','=','event.organization_id')
                          ->join('campus','campus.id','=','organization.campus_id')
                          ->select('sub_event.*')
                          ->where('campus.id', $campusId)
                          ->paginate(12);

        return view('guest.event')->with('subEvents', $subEvents)
                                  ->with('categories', $categories)
                                  ->with('campus',$campus)
                                  ->with('organizations', $organizations);

      }else if ($campusId == "all"){ // cek
        $subEvents = SubEvent::join('event','event.id','=','sub_event.event_id')
                          ->join('organization','organization.id','=','event.organization_id')
                          ->join('event_category','event_category.sub_event_id','=','sub_event.id')
                          ->join('category','category.id','=','event_category.category_id')
                          ->select('sub_event.*', 'category.name as category')
                          ->where('organization.id', $organizationId)
                          ->where('event_category.category_id', $categoryId)
                          ->paginate(12);
        $oldCategory = EventCategory::with('category')->where('category_id', $categoryId)->first();

        return view('guest.event')->with('subEvents', $subEvents)
                                  ->with('categories', $categories)
                                  ->with('campus',$campus)
                                  ->with('organizations', $organizations)
                                  ->with('oldCategoryId', $categoryId)
                                  ->with('oldCategoryName', $oldCategory->category->name);

      }else if ($organizationId == "all"){ // cek
        $subEvents = SubEvent::join('event','event.id','=','sub_event.event_id')
                          ->join('organization','organization.id','=','event.organization_id')
                          ->join('campus','campus.id','=','organization.campus_id')
                          ->join('event_category','event_category.sub_event_id','=','sub_event.id')
                          ->join('category','category.id','=','event_category.category_id')
                          ->select('sub_event.*', 'category.name as category')
                          ->where('event_category.category_id', $categoryId)
                          ->where('campus.id', $campusId)
                          ->paginate(12);
        $oldCategory = EventCategory::with('category')->where('category_id', $categoryId)->first();

        return view('guest.event')->with('subEvents', $subEvents)
                                  ->with('categories', $categories)
                                  ->with('campus',$campus)
                                  ->with('organizations', $organizations)
                                  ->with('oldCategoryId', $categoryId)
                                  ->with('oldCategoryName', $oldCategory->category->name);
      }else if ($categoryId == "all"){ // cek
        $subEvents = SubEvent::join('event','event.id','=','sub_event.event_id')
                          ->join('organization','organization.id','=','event.organization_id')
                          ->join('campus','campus.id','=','organization.campus_id')
                          ->where('organization.id', $organizationId)
                          ->where('campus.id', $campusId)
                          ->select('sub_event.*')
                          ->paginate(12);

        return view('guest.event')->with('subEvents', $subEvents)
                                  ->with('categories', $categories)
                                  ->with('campus',$campus)
                                  ->with('organizations', $organizations);
      }else{
        $subEvents = SubEvent::join('event','event.id','=','sub_event.event_id')
                          ->join('organization','organization.id','=','event.organization_id')
                          ->join('campus','campus.id','=','organization.campus_id')
                          ->select('sub_event.*')
                          ->where('campus.id', $campusId)
                          ->where('organization.id', $organizationId)
                          ->paginate(12);
        $oldCategory = EventCategory::with('category')->where('category_id', $categoryId)->first();
        return view('guest.event')->with('subEvents', $subEvents)
                                  ->with('categories', $categories)
                                  ->with('campus',$campus)
                                  ->with('organizations', $organizations)
                                  ->with('oldCategoryId', $categoryId)
                                  ->with('oldCategoryName', $oldCategory->category->name);
      }
    }

    public function front_end($id=null,$status=null,$tiket=null){
      ###Transaksi dan Tiket###
      // tabel transaksi
      if($id==1 && $status==null){
        return view('front_end.transaksi');
      }
      // menunggu pembayaran
      if($id==1 && $status==1){
        return view('front_end.konfirmasi')->with('status', $status);
      }
      // pembayaran dibatalkan
      if($id==1 && $status==2){
        return view('front_end.konfirmasi')->with('status', $status);
      }
      // pembayaran diproses
      if($id==1 && $status==3){
        return view('front_end.konfirmasi')->with('status', $status);
      }
      // pembayaran ditolak
      if($id==1 && $status==4){
        return view('front_end.konfirmasi')->with('status', $status);
      }
      // pembayaran berhasil
      if($id==1 && $status==5 && $tiket==null){
        return view('front_end.konfirmasi')->with('status', $status);
      }
      // tiket
      if($id==1 && $status==5 && $tiket==1){
        return view('front_end.tiket');
      }

      ###Edit Profil###
      if ($id==2) {
        return view('front_end.profil');
      }
    }

}
