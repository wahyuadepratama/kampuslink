<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
      $this->call([
        RolesTableSeeder::class,
        CampusSeeder::class,
        FacultySeeder::class,
        ProgramStudySeeder::class,
        UserTableSeeder::class,
        OrganizationSeeder::class
      ]);
    }
}
