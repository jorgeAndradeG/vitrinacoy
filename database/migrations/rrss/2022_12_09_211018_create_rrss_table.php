<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rrss', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('id_mype')->unsigned();
            $table->integer('instagram')->default('0');
            $table->integer('tiktok')->default('0');
            $table->integer('sitio_web')->default('0');
            $table->integer('facebook')->default('0');
            $table->integer('whatsapp_business')->default('0');
            $table->foreign('id_mype')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('rrss');
    }
};
