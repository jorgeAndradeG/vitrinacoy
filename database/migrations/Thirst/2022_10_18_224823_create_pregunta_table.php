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
        Schema::create('pregunta', function (Blueprint $table) {
            $table->Increments('id');
            $table->Integer('id_mype')->unsigned();
            $table->Integer('id_superadmin')->unsigned();
            $table->longText('pregunta');
            $table->longText('respuesta');
            $table->Integer('estado');
            $table->foreign('id_mype')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_superadmin')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('pregunta');
    }
};
