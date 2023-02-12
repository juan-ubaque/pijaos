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
        Schema::create('gestion_hospitalaria', function (Blueprint $table) {
            $table->id('ID_HOSPITALIZACION')->AutoIncrement();
            //Creamos un choise para los tipos de documentos mas comunes
            $table->enum('TIPO_DOC_PACIENTE', ['CC', 'TI', 'CE','OTRO']);

            //agregamos la clave foranea de la tabla paciente con eliminacion en cascada
            $table->unsignedBigInteger('NO_DOC_PACIENTE');
            //$table->foreign('NO_DOC_PACIENTE')->references('NO_DOCUMENTO')->on('pacientes')->onDelete('cascade');


            $table->unsignedBigInteger('COD_HOSPITAL');
            //agregamos la clave foranea de la tabla hospital con eliminacion en cascada
            //$table->foreign('COD_HOSPITAL')->references('COD_HOSPITAL')->on('hospitales')->onDelete('cascade');
            $table->timestamps();
            $table->date('FEC_INGRESO');
            $table->date('FEC_SALIDA');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gestion_hospitalarias');
    }
};
