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
            $table->string('name', 100)->nullable();
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->integer('role_id')->unsigned()->index();
            $table->integer('discount_id')->unsigned()->index();
            $table->string('avatar')->default('default-avatar.png');            
            $table->string('phone',15)->nullable();
            $table->string('sosmed')->nullable();
            $table->boolean('verified')->nullable();
            $table->string('email_confirmation')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
