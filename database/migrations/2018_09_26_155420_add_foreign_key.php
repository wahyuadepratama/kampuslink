<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('users', function (Blueprint $table) {
          $table->foreign('program_study_id')->references('id')->on('program_study')->onDelete('cascade')->onUpdate('cascade');
      });

      Schema::table('program_study', function (Blueprint $table) {
          $table->foreign('faculty_id')->references('id')->on('faculty')->onDelete('cascade')->onUpdate('cascade');
      });

      Schema::table('faculty', function (Blueprint $table) {
          $table->foreign('campus_id')->references('id')->on('campus')->onDelete('cascade')->onUpdate('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
