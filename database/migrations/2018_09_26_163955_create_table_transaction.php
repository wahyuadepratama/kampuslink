<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('transaction', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('ticket_total');
          $table->decimal('admin_cost');
          $table->integer('unique_code');
          $table->decimal('cost_total');
          $table->string('sender');
          $table->string('proof_payment')->default('default-proof.svg');
          $table->string('status');
          $table->timestamps();

          $table->integer('user_id')->unsigned()->index();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

          $table->integer('sub_event_id')->unsigned()->index();
          $table->foreign('sub_event_id')->references('id')->on('sub_event')->onDelete('cascade')->onUpdate('cascade');
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
