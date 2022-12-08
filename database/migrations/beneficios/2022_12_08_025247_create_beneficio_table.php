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
        Schema::create('beneficio', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('id_entidad')->unsigned()->nullable();
            $table->string('nombre');
            $table->longText('descripcion')->nullable();
            $table->integer('edad_minima')->nullable();
            $table->string('tipo_persona_postulante');
            $table->string('sexo_postulante')->nullable();
            $table->boolean('tiene_inicio_actividades')->nullable();
            $table->integer('ventas_netas_minimas')->nullable();
            $table->integer('ventas_netas_maximas')->nullable();
            $table->integer('meses_antiguedad_inicio_actividades')->nullable();
            $table->boolean('participa_en_fosis')->nullable();
            $table->string('link');
            $table->Integer('estado')->default('1');
            $table->foreign('id_entidad')->references('id')->on('entidad_beneficio')->onDelete('cascade');
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
        Schema::dropIfExists('beneficio');
    }
};
