<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        [
          'username' => "badusaputra",
          'email' => 'badu@gmail.com',
          'password' => '$2y$10$.7hqO3OKindL4AA.nxVTb.2QJGo/mpPBNjDc2Uc800T0HTmrl9wGa',
          'fullname' => 'Badu Saputra',
          'nim' => '1511521021',
          'phone' => '081371321919'
          'role_id' => 1,
          'remember_token' => str_random(40),
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ],
       ]);

    }
}
