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
        Schema::create('pacientes', function (Blueprint $table) {
            //Creamos un choise para los tipos de documentos mas comunes
            $table->unsignedBigInteger('NO_DOCUMENTO')->primary();
            $table->enum('TIPO_DOC', ['CC', 'TI', 'CE','OTRO']);
            $table->string('NOMBRES');
            $table->string('APELLIDOS');
            //fecha de nacimiento
            $table->date('FEC_NACIMIENTO');
            //EMAIL
            $table->string('EMAIL');
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
        Schema::dropIfExists('pacientes');
    }
};
