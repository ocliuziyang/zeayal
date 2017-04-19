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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('is_admin')->default(false);
            $table->string('real_name')->nullable()->comment('真实姓名 可为空');
            $table->string('phone_number')->unique()->nullable()->comment('手机号，可为空');
            $table->boolean('sex')->nullable()->comment('性别 可为空');
            $table->date('birthday')->nullable()->comment('出生日期 可为空');
            $table->string('bio')->nullable()->comment('个人简介 可为空');
            $table->string('avatar')->default('/images/user.png');
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
