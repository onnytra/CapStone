<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnasentisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anasentis', function (Blueprint $table) {
            $table->increments('id_anasenti',11);
            $table->text('sentimen');
            $table->string('label', 20);
            $table->unsignedInteger('id_channel');
            $table->foreign('id_channel')->references('id_channel')->on('channelsosmeds')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('anasentis');
    }
}
