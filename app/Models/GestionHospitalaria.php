<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestionHospitalaria extends Model
{
    use HasFactory;


    //agregamos el metodo para la relacion de uno a muchos con la tabla hospital
    protected $table = 'gestion_hospitalaria';
    //Indicamos el uso del campo created_ad
    // se debe especificar el nombre de la clave primaria del siguiente modo:
        protected $primaryKey = 'ID_HOSPITALIZACION';

    //indicamos los campos que se pueden llenar
    protected $dates = ['created_at', 'deleted_at'];
    public function hospital()
{
    return $this->belongsTo(Hospital::class, 'COD_HOSPITAL', 'COD_HOSPITAL');
}

public function paciente()
{
    return $this->belongsTo(Paciente::class, 'NO_DOC_PACIENTE', 'NO_DOCUMENTO');
}

}
