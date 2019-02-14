<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ticket;
use App\Models\SubEvent;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\SubEventTicket;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
      $this->middleware('user');
    }

    public function indexTransaction()
    {
      $transaction  = Transaction::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();

      // return Transaction::join('ticket','ticket.transaction_id','=','transaction.id')
      //                 ->select('transaction.*', 'ticket.price', 'ticket.qr_code', 'ticket.link', 'ticket.status', 'transaction.status as transaction_status')
      //                 ->where('transaction.user_id', Auth::user()->id)
      //                 ->orderBy('transaction.created_at','asc')
      //                 ->get();

      return view('user.transaction')->with('transactions', $transaction);
    }

    public function showTransaction($id)
    {
      $oneTransaction = Transaction::find($id);
      $this->checkOwner($oneTransaction->user_id);

      $oneTransaction->seen = true;
      $oneTransaction->save();

      $ticket = Ticket::where('transaction_id', $oneTransaction->id)->get();
      $total = 0;

      foreach($ticket as $key){
        $total = $total + $key->price;
      }

      return view('user.detail_transaction')->with('status', $oneTransaction->status)
                                            ->with('transaction', $oneTransaction)
                                            ->with('total', $total);

      $ticket = Ticket::where('transaction_id', $id)->get();
    }

    public function checkOwner($id)
    {
      if(Auth::user()->id != $id){
        return abort(404);
      }
    }

    public function processTransaction($slug)
    {
      $subEvent = SubEvent::where('slug', $slug)->first();
      $subEventTicket = SubEventTicket::where('sub_event_id', $subEvent->id)->get();

      return view('user/process')->with('subEventTicket', $subEventTicket)->with('slug', $slug);
    }

    public function postProcessTransaction(Request $request, $slug)
    {
      $subEvent = SubEvent::where('slug', $slug)->first();
      $subEventTicket = SubEventTicket::where('sub_event_id', $subEvent->id)->get();

      $unique_code = $new =  rand(100,900);

      $new = Transaction::create([
        'user_id' => Auth::user()->id,
        'sub_event_id' => $subEvent->id,
        'admin_cost' => 300,
        'unique_code' => $unique_code,
        'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
      ]);

      foreach($subEventTicket as $key){
        Ticket::create([
          'transaction_id' => $new->id,
          'price' => $request->qty[$key->type] * $key->price,
          'qr_code' => 'qr/'. rand(1000000000,9000000000),
          'link' => 'link/'. rand(1000000000,9000000000),
          'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ]);
      }

      return redirect('transaction/'. $new->id);
    }
}
