<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id()->unsigned()->autoIncrement();
            $table->string('name', 255);
            $table->string('surname', 255);
            $table->string('phone', 255);
            $table->text('address');
            $table->string('profile_photo', 255);

            $table->tinyInteger('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles');
//            $table->rememberToken();
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
