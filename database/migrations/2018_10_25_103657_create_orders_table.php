<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned()->index();
            $table->string('name',100); //design spanduk, pamflet, poster, dll
            $table->integer('price');
            $table->string('status',20)->default('waiting'); //waiting, on_progress, done, revision, done            
            $table->string('size_long', 20)->nullable();
            $table->string('size_wide', 20)->nullable();
            $table->mediumText('content')->nullable();
            $table->string('theme')->nullable();
            $table->string('file')->nullable();
            $table->string('note')->nullable();
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
