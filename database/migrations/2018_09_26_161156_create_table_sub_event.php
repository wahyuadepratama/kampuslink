<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSubEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('sub_event', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->text('description');
        $table->string('qr_code');
        $table->integer('ticket_stock');
        $table->decimal('price');
        $table->string('status');
        $table->timestamp('start_time')->nullable();
        $table->timestamp('end_time')->nullable();
        $table->timestamp('date')->nullable();
        $table->string('photo')->default('default-event.svg');
        $table->string('web_link');
        $table->timestamps();

        $table->integer('category_id')->unsigned()->index();

        $table->integer('event_id')->unsigned()->index();
        $table->foreign('event_id')->references('id')->on('event')->onDelete('cascade')->onUpdate('cascade');
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
