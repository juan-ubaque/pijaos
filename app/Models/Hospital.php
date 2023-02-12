<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;
    // es opcional, si el nombre de la tabla es igual al nombre del modelo
    protected $table = 'hospitales';
    // En caso de haber modificado el nombre de la clave primaria en las migraciones
    // se debe especificar el nombre de la clave primaria del siguiente modo:
    protected $primaryKey = 'COD_HOSPITAL';

    //Agregamos la relacion de uno a muchos con la tabla gestion_hospitalaria
    public function gestion_hospitalaria()
{
    return $this->hasMany(GestionHospitalaria::class, 'COD_HOSPITAL', 'COD_HOSPITAL');
}

}
