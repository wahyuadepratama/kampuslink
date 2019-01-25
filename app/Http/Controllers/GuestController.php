<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Organization;

class GuestController extends Controller
{
    public function index()
    {
      $event = Event::all();
      return view('guest.index')->with('events', $event);
    }

    public function indexCategory()
    {
      return view('guest.category');
    }
}
