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
        OrganizationSeeder::class,
        EventCategorySeeder::class,
        EventSeeder::class,
        SubEventSeeder::class,
        CommentSeeder::class,
        TransactionSeeder::class,
        TicketSeeder::class,
        SuggestionSeeder::class
      ]);
    }
}
