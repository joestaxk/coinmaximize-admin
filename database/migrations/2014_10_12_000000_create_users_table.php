<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email', 180)->unique();
            $table->string('reset_code', 180)->unique()->nullable();
            $table->integer('role')->default(2);
            $table->integer('status')->default(1);
            $table->string('phone')->nullable();
            $table->tinyInteger('phone_verified')->default(0);
            $table->string('country')->nullable();
            $table->tinyInteger('gender')->default(1);
            $table->string('birth_date')->nullable();
            $table->string('photo')->nullable();
            $table->enum('g2f_enabled',[0,1]);
            $table->string('google2fa_secret')->nullable();
            $table->tinyInteger('is_verified')->default(0);
            $table->string('password');
            $table->string('language')->default('en');
            $table->string('credit_score')->default(0);
            $table->string('device_id')->nullable();
            $table->tinyInteger('device_type')->default(1);
            $table->tinyInteger('push_notification_status')->default(1);
            $table->tinyInteger('email_notification_status')->default(1);
            $table->rememberToken();
            $table->timestamps();
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
