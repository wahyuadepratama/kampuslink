<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTicket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('ticket', function (Blueprint $table) {
          $table->increments('id');
          $table->string('qr_code');
          $table->string('status');
          $table->timestamps();

          $table->integer('transaction_id')->unsigned()->index();
          $table->foreign('transaction_id')->references('id')->on('transaction')->onDelete('cascade')->onUpdate('cascade');
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
