<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\SubEvent;
use App\Models\EventCategory;
use App\Models\Organization;
use App\Models\UserOrganization;
use App\Models\Viewer;
use App\Models\EventViewer;
use App\Models\Category;
use App\Models\Campus;
use App\Models\Faculty;
use App\Models\ProgramStudy;
use App\Models\Kuisioner_1;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function index()
    {

      if(isset(Auth::user()->role_id)){
        if(Auth::user()->role_id == 3){
          return view('errors/coming_soon');
        }elseif(Auth::user()->role_id == 2){
          $o = UserOrganization::where('user_id', Auth::user()->id)->first();
          return redirect('organization/'. $o->organization->instagram);
        }elseif(Auth::user()->role_id == 1){
          return redirect('admin');
        }
      }else{
        return redirect('login');
      }

      $this->checkDueEvent();
      $subEvents = Cache::remember('index_sub_events', 30, function () {
                      return SubEvent::with('event')->where('approved', 1)->where('status','ongoing')
                                            ->orderBy('created_at','desc')
                                            ->take(10)
                                            ->get();
                   });

      $subEventRatings  = Cache::remember('index_sub_event_ratings', 30, function () {
                          return EventViewer::join('sub_event','event_viewer.sub_event_id','=','sub_event.id')
                                        ->select('sub_event_id', DB::raw('count(*) as total'))
                                        ->where('sub_event.status','ongoing')
                                        ->groupBy('sub_event_id')
                                        ->orderBy('total','desc')
                                        ->take(5)
                                        ->get();
                        });

      $subEventRatings2  = Cache::remember('index_sub_event_rating_2', 30, function () {
                              return EventViewer::join('sub_event','event_viewer.sub_event_id','=','sub_event.id')
                                                ->select('sub_event_id', DB::raw('count(*) as total'))
                                                ->where('sub_event.status','ongoing')
                                                ->groupBy('sub_event_id')
                                                ->orderBy('total','desc')
                                                ->take(10)
                                                ->get();
                          });

      $categories = Cache::remember('index_categories', 30, function () {
                        return Category::orderBy('name')->get();
                    });

      return view('guest.index')->with('subEvents', $subEvents)
                                ->with('subEventRatings', $subEventRatings)
                                ->with('categories', $categories)
                                ->with('subEventRatings2', $subEventRatings2);
    }

    public function checkDueEvent()
    {
      $subEvents = SubEvent::with('event')->where('status','ongoing')->get();
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
      $subEvents  = Cache::remember('index_event_sub_events', 30, function () {
                        return SubEvent::with('event')->where('approved', 1)->where('status','ongoing')->orderBy('date','asc')->paginate(20);
                    });
      $categories = Cache::remember('index_event_categories', 30, function () {
                        return Category::orderBy('name','asc')->get();
                    });
      $campus     = Cache::remember('index_event_campus', 30, function () {
                        return Campus::orderBy('name','asc')->get();
                    });
      $organizations = Cache::remember('index_event_organizations', 30, function () {
                          return Organization::orderBy('name','asc')->get();
                      });

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
      $suggestions = SubEvent::where('event_id', $subEvent->id)->where('approved', 1)->where('status','ongoing')->inRandomOrder()->limit(10)->get();
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
          $data = SubEvent::inRandomOrder()->where('approved', 1)->where('status','ongoing')->limit(10)->get();
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
      $categories = Cache::remember('filter_categories', 30, function () {
                        return Category::orderBy('name','asc')->get();
                    });

      $campus     = Cache::remember('filter_campus', 30, function () {
                      return Campus::orderBy('name','asc')->get();
                    });

      $organizations = Cache::remember('filter_organizations', 30, function () {
                          return Organization::orderBy('name','asc')->get();
                        });

      if ($campusId == "all" && $organizationId == "all" && $categoryId == "all"){

        return redirect('/event');

      }else if ($campusId == "all" && $organizationId == "all"){
        $subEvents = SubEvent::join('event_category','event_category.sub_event_id','=','sub_event.id')
                          ->join('category','category.id','=','event_category.category_id')
                          ->select('sub_event.*', 'category.name as category')
                          ->where('event_category.category_id', $categoryId)
                          ->where('sub_event.status', 'ongoing')
                          ->where('sub_event.approved', 1)
                          ->orderBy('sub_event.date','asc')
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
                          ->where('sub_event.status', 'ongoing')
                          ->where('sub_event.approved', 1)
                          ->orderBy('sub_event.date','asc')
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
                          ->where('sub_event.status', 'ongoing')
                          ->where('sub_event.approved', 1)
                          ->orderBy('sub_event.date','asc')
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
                          ->where('sub_event.status', 'ongoing')
                          ->where('sub_event.approved', 1)
                          ->orderBy('sub_event.date','asc')
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
                          ->where('sub_event.status', 'ongoing')
                          ->where('sub_event.approved', 1)
                          ->orderBy('sub_event.date','asc')
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
                          ->where('sub_event.status', 'ongoing')
                          ->where('sub_event.approved', 1)
                          ->select('sub_event.*')
                          ->orderBy('sub_event.date','asc')
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
                          ->where('sub_event.status', 'ongoing')
                          ->where('sub_event.approved', 1)
                          ->orderBy('sub_event.date','asc')
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

    public function getDataSubEvent()
    {
      return SubEvent::where('approved', 1)->where('status','ongoing')->get();
    }

    public function search(Request $request)
    {
      $data = SubEvent::where('name', $request->event)->first();
      if($data){
        return redirect('/event'.'/'. $data->slug );
      }else{
        return redirect('/event/search/'. $request->event);
      }
    }

    public function indexSearch($query)
    {
      $data = SubEvent::where('name', 'like', '%' . $query . '%')->get();
      return view('guest/index_search')->with('event', $data)->with('query', $query);
    }

    public function getDataFaculty($id)
    {
      return Faculty::where('campus_id' ,$id)->orderBy('name')->get();
    }

    public function getDataProgramStudy($id)
    {
      return ProgramStudy::where('faculty_id', $id)->orderBy('name')->get();
    }

    public function showRegisterOrganization()
    {
      if(Auth::check()){
        $organization = Organization::where('creator', Auth::user()->username)->get();
        foreach($organization as $key){
          if($key->approved == 0){
            return view('user/register_organization_message')->with('name', $key->name);
          }
        }
      }

      $campus = Campus::all();
      return view('user/register_organization')->with('campus', $campus);
    }

    public function storeRegisterOrganization(Request $request)
    {
      $this->validate($request,[
        'name' => 'required',
        'ig' => 'required',
        'description' => 'required',
      ]);

      if($request->campus == "0"){
        return back()->withInput()->with('error', 'Please select your campus!');
      }

      $organization = Organization::where('name', $request->name)->first();
      if(isset($organization)){
        return back()->withInput()->with('error', 'Your organization has registered!');
      }

      if ($request->ig == trim($request->ig) && strpos($request->ig, ' ') !== false) {
        return back()->withInput()->with('error', 'Your instagram organization has registered!');
      }
        
      if (substr($request->ig,0,1) != "@") {
        return back()->withInput()->with('error', 'Gunakan @ pada kolom instagram, contoh @neotelemetri!');
      }
        
      $create = Organization::create([
        'campus_id' => $request->campus,
        'name' => $request->name,
        'creator' => Auth::user()->username,
        'instagram' => $request->ig,
        'description' => $request->description,
        'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
      ]);

      UserOrganization::create([
        'user_id' => Auth::user()->id,
        'organization_id' => $create->id
      ]);

      return redirect('/register-organization');
    }
    
    public function kuisioner(){
      return view('guest.kuisioner');
    }
    public function kuisioner_submit(Request $request){
      if($request->isMethod('post')){
        $d = $request->all();
        $k = new Kuisioner_1;
        $k->nama       = ucwords($d['nama']);
        $k->jk         = $d['jk'];
        $k->kampus     = $d['kampus'];
        $k->nim        = $d['nim'];
        $k->email      = $d['email'];
        $k->wa         = $d['wa'];
        $k->hobi       = $d['hobi'];

        $acara_c = count($request->get('acara'));
        $acara   = "";
        for ($i=0; $i<$acara_c; $i++) { 
          $acara .= $request->get('acara')[$i].", ";
        }
        $k->acara      = $acara;

        $info_c = count($request->get('info'));
        $info   = "";
        for ($i=0; $i<$info_c; $i++) { 
          $info .= $request->get('info')[$i].", ";
        }
        $k->info       = $info;
        
        $k->bukan_ai   = $d['bukan_ai'];
        $k->tertarik   = $d['tertarik'];
        $k->harap      = $d['harap'];
        $k->kf         = $d['kf'];
        $k->kf2        = $d['kf2'];
        $k->passion    = $d['passion'];
        $k->passion2   = $d['passion2'];
        $k->created_at = Carbon::now()->setTimezone('Asia/Jakarta');
        $k->save();
        
        $nama = $d['nama'];
      }

      return view('guest.kuisioner_submit')->with(compact('nama'));
      // return $acara;
    }

}
