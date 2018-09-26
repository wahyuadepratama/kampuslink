<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('comment', function (Blueprint $table) {
          $table->increments('id');
          $table->text('content');
          $table->timestamps();

          $table->integer('sub_event_id')->unsigned()->index();
          $table->foreign('sub_event_id')->references('id')->on('sub_event')->onDelete('cascade')->onUpdate('cascade');

          $table->integer('sender')->unsigned()->index();
          $table->foreign('sender')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
