<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\SubEvent;
use App\Models\Event;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

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

    // public function indexDeletedUser()
    // {
    //   $deletedUsers = User::onlyTrashed()->get();
    //   return view('admin/user-management-blocked')->with('deletedUsers', $deletedUsers);
    // }
    //
    // public function deleteUser($id)
    // {
    //   $user = User::find($id);
    //   $user->delete();
    //   return back()->with('success','You have successfully block user');
    // }
    //
    // public function destroyUser($id)
    // {
    //   $user = User::where('id',$id)->forceDelete();
    //   return back()->with('success','You have successfully destroy user');
    // }
    //
    // public function restoreUser($id)
    // {
    //   $restore = User::withTrashed()->where('id',$id);
    //   $restore->restore();
    //   return back()->with('success','You have successfully restore user');
    // }

}
