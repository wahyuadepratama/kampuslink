<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('transaction')->insert([
        [
          'ticket_total' => 4,
          'admin_cost' => 300,
          'unique_code' => 12131,
          'cost_total' => 120000,
          'sender' => 'Hapis Firman',
          'proof_payment' => 'blalba.jpg',
          'status' => 'pending',
          'user_id' => 2,
          'sub_event_id' => 1,
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ],
        [
          'ticket_total' => 1,
          'admin_cost' => 300,
          'unique_code' => 12131,
          'cost_total' => 20000,
          'sender' => 'Aqli Mulia',
          'proof_payment' => 'bla.jpg',
          'status' => 'pending',
          'user_id' => 3,
          'sub_event_id' => 2,
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ]
       ]);
    }
}
