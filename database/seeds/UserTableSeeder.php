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
          'username' => "admin",
          'email' => 'admin@gmail.com',
          'password' => '$2y$10$.7hqO3OKindL4AA.nxVTb.2QJGo/mpPBNjDc2Uc800T0HTmrl9wGa',
          'fullname' => 'Administrator',
          'nim' => '1511521021',
          'phone' => '081371321919',
          'role_id' => 1,
          'remember_token' => str_random(40),
          'program_study_id' => 1,
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ],
        [
          'username' => "badusaputra",
          'email' => 'badu@gmail.com',
          'password' => '$2y$10$.7hqO3OKindL4AA.nxVTb.2QJGo/mpPBNjDc2Uc800T0HTmrl9wGa',
          'fullname' => 'Badu Saputra',
          'nim' => '1511521022',
          'phone' => '081371321919',
          'role_id' => 2,
          'remember_token' => str_random(40),
          'program_study_id' => 2,
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ],
        [
          'username' => "budiperkasa",
          'email' => 'budi@gmail.com',
          'password' => '$2y$10$.7hqO3OKindL4AA.nxVTb.2QJGo/mpPBNjDc2Uc800T0HTmrl9wGa',
          'fullname' => 'Budi Perkasa',
          'nim' => '1511521023',
          'phone' => '081371421919',
          'role_id' => 2,
          'remember_token' => str_random(40),
          'program_study_id' => 3,
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ],
        [
          'username' => "sitisarah",
          'email' => 'siti@gmail.com',
          'password' => '$2y$10$.7hqO3OKindL4AA.nxVTb.2QJGo/mpPBNjDc2Uc800T0HTmrl9wGa',
          'fullname' => 'Siti Sarah',
          'nim' => '1511521020',
          'phone' => '08137141919',
          'role_id' => 2,
          'remember_token' => str_random(40),
          'program_study_id' => 3,
          'created_at'=> Carbon::now(),
          'updated_at'=> Carbon::now(),
        ]
       ]);

    }
}
