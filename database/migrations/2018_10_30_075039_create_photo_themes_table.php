<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_themes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path');
            $table->integer('theme_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('theme_id')->references('id')->on('themes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photo_themes');
    }
}
