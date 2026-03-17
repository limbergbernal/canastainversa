<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    use HasFactory;
    protected $table = 'barrios';
    protected $primaryKey = 'id';
    protected $fillable =['nombre_completo','ci','civil','expedido','sexo','fecha_nac','inscripcion','profesion','direccion','ocupacion','celular','estado','barrio_id'];
}
