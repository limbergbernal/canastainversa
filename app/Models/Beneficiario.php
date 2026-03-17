<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    use HasFactory;
    protected $table = 'beneficiarios';
    protected $primaryKey = 'id';
    protected $fillable =['nombre_completo','ci','firma','civil','expedido','sexo','fecha_nac','inscripcion','profesion','direccion','ocupacion','celular','estado','barrio_id'];

    public function barrio(){
        return $this->belongsTo(Barrio::class, 'barrio_id');
    }
    public function entregas(){
        return $this->hasMany(Entrega::class, 'beneficiario_id','id');
    }
}
