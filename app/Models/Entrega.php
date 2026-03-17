<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    use HasFactory;
    protected $table = 'barrios';
    protected $primaryKey = 'id';
    protected $fillable =['ano','entrega','nombre_completo','ci','estado','beneficiario_id','barrio_id'];
}
