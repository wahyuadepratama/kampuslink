<?php

namespace App\Http\Controllers;

use DateTime;
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
use Intervention\Image\Facades\Image as Image;

class TransactionController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
      $this->middleware('user');
    }

    public function indexTransaction()
    {
      $transaction  = Transaction::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();

      return view('user.transaction')->with('transactions', $transaction);
    }

    public function showTransaction($code)
    {
      $oneTransaction = Transaction::where('unique_code', $code)->first();
      $this->checkOwner($oneTransaction->user_id);

      $oneTransaction->seen = true;
      $oneTransaction->save();

      $ticket = Ticket::where('transaction_id', $oneTransaction->id)->get();
      $total = 0;

      foreach($ticket as $key){
        $total = $total + $key->price;
      }

      if($oneTransaction->status == "Menunggu Pembayaran" | $oneTransaction->status == "Konfirmasi Tiket"){
        $past = false;
        if(Carbon::now()->setTimezone('Asia/Jakarta')->year >= Carbon::parse($oneTransaction->countdown)->year){
          $past = true;
          if(Carbon::now()->setTimezone('Asia/Jakarta')->month >= Carbon::parse($oneTransaction->countdown)->month){
            $past = true;
            if(Carbon::now()->setTimezone('Asia/Jakarta')->day >= Carbon::parse($oneTransaction->countdown)->day){
              $past = true;
              if(Carbon::now()->setTimezone('Asia/Jakarta')->hour >= Carbon::parse($oneTransaction->countdown)->hour){
                $past = true;
                if(Carbon::now()->setTimezone('Asia/Jakarta')->minute >= Carbon::parse($oneTransaction->countdown)->minute){
                  $past = true;
                  if(Carbon::now()->setTimezone('Asia/Jakarta')->second >= Carbon::parse($oneTransaction->countdown)->second){
                    $past = true;
                  }else{ $past = false; }
                }else{ $past = false; }
              }else{ $past = false; }
            }else{ $past = false; }
          }else{ $past = false; }
        }else{ $past = false; }

        if($past === true){
          $oneTransaction->status = "Pembayaran Dibatalkan";
          $oneTransaction->seen = 0;
          $oneTransaction->save();
        }
      }      

      return view('user.detail_transaction')->with('status', $oneTransaction->status)
                                            ->with('transaction', $oneTransaction)
                                            ->with('total', $total);
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
      $totalData = 0;
      $totalReguler = 0;
      $totalVip = 0;

      foreach ($request->qty as $key => $value) {
        $totalData = $totalData + $value;
        if($key == "Reguler"){
          $totalReguler = $totalReguler + $value;
        }elseif($key == "VIP"){
          $totalVip = $totalVip + $value;
        }
      }

      if($totalData <= 0){
          return back()->with('error', 'Kamu belum memesan apapun!');
      }

      $subEvent = SubEvent::where('slug', $slug)->first();
      $countdown = Carbon::now()->setTimezone('Asia/Jakarta')->addHour(2);

      $subEventTicketReguler = SubEventTicket::where('sub_event_id', $subEvent->id)->where('type', 'Reguler')->first();
      $subEventTicketVip = SubEventTicket::where('sub_event_id', $subEvent->id)->where('type', 'VIP')->first();

      if(isset($subEventTicketReguler)){
        if($subEventTicketReguler->stock <= $totalReguler){
          return back()->with('error', 'Kuota tiket reguler sudah habis!');
        }
      }

      if(isset($subEventTicketVip)){
        if($subEventTicketVip->stock <= $totalVip){
          return back()->with('error', 'Kuota tiket VIP sudah habis!');
        }
      }

      $new = Transaction::create([
        'user_id' => Auth::user()->id,
        'sub_event_id' => $subEvent->id,
        'unique_code' => time(),
        'countdown' => $countdown,
        'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
      ]);

      for($x = 0;$x < $totalReguler;$x++){
        Ticket::create([
          'transaction_id' => $new->id,
          'price' => $subEventTicketReguler->price,
          'type' => "Reguler",
          'qr_code' => 'qr/'. rand(100000000000,900000000000),
          'link' => 'link/'. rand(100000000000,900000000000),
          'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ]);
      }

      for($x = 0;$x < $totalVip;$x++){
        Ticket::create([
          'transaction_id' => $new->id,
          'price' => $subEventTicketVip->price,
          'type' => "VIP",
          'qr_code' => 'qr/'. rand(1000000000,9000000000),
          'link' => 'link/'. rand(1000000000,9000000000),
          'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ]);
      }

      return redirect('transaction/'. $new->unique_code);
    }

    public function confirmTransaction(Request $request, $slug)
    {
      foreach($request->value as $key => $value){
        $ticket = Ticket::find($key);
        $ticket->owner = $value;
        $ticket->save();
      }
      $transaction = Transaction::where('unique_code', $slug)->first();
      $transaction->status = "Menunggu Pembayaran";
      $transaction->seen = 0;
      $transaction->save();
      return back();
    }

    public function proofTransaction(Request $request, $slug)
    {
      $thumbnail     = $request->file('proof');
      $filename      = 'payment_' . str_slug($slug).'_'.time() . '.' . $thumbnail->getClientOriginalExtension();
      $small         = 'storage/proof/' . $filename;
      $createSmall   = Image::make($thumbnail)->resize(300, 300)->save($small);

      $transaction = Transaction::where('unique_code', $slug)->first();
      $transaction->status = "Diproses";
      $transaction->seen = 0;
      $transaction->save();
      return back();
    }
}
