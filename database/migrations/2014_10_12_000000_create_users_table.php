<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('fullname')->nullable();
            $table->string('nim');
            $table->string('phone');
            $table->string('photo_profile')->default('default-avatar.svg');
            $table->string('photo_ktm')->default('default-avatar.svg');
            $table->timestamp('date_birth')->nullable();
            $table->string('gender')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->string('token_fcm');
            $table->string('phone_type');
            $table->string('android_type');
            $table->string('apps_version');
            $table->string('banned');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->integer('role_id')->unsigned()->index();
            $table->integer('program_study_id')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
