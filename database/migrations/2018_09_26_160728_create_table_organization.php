<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrganization extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('organization', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('photo_profile')->default('default-avatar.svg');
          $table->string('photo_cover')->default('default-cover.svg');
          $table->string('instagram')->nullable();
          $table->string('line')->nullable();
          $table->string('facebook')->nullable();
          $table->string('whatsapp')->nullable();
          $table->string('phone')->nullable();
          $table->text('description');
          $table->timestamps();

          $table->integer('user_id')->unsigned()->index();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
