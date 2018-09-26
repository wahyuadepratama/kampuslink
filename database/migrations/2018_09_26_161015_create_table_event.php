<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('event', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->text('description');
          $table->string('qr_code');
          $table->string('status');
          $table->timestamp('start_time')->nullable();
          $table->timestamp('end_time')->nullable();
          $table->timestamp('date')->nullable();
          $table->string('photo')->default('default-event.svg');
          $table->string('web_link');
          $table->timestamps();

          $table->integer('organization_id')->unsigned()->index();
          $table->foreign('organization_id')->references('id')->on('organization')->onDelete('cascade')->onUpdate('cascade');
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
