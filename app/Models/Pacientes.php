<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    use HasFactory;

    //bloqueamos los campos que no queremos que se asignen al modelo
    //indicamos el nombre de el id de la tabla
    protected $primaryKey = 'NO_DOCUMENTO';
    //Indicamos el nombre del choise de la tabla




    public function gestion_hospitalaria()
{
    return $this->hasMany(GestionHospitalaria::class, 'NO_DOC_PACIENTE', 'NO_DOCUMENTO');
}

}

