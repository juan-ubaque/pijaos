<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestionHospitalaria extends Model
{
    use HasFactory;


    //agregamos el metodo para la relacion de uno a muchos con la tabla hospital
    //public function hospital()
    //{
    //    return $this->belongsTo('App\Models\Hospital');
    //}

    public function hospital()
{
    return $this->belongsTo(Hospital::class, 'COD_HOSPITAL', 'COD_HOSPITAL');
}

public function paciente()
{
    return $this->belongsTo(Paciente::class, 'NO_DOC_PACIENTE', 'NO_DOCUMENTO');
}

}
