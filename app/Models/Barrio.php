<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barrio extends Model
{
    use HasFactory;
    protected $table = 'barrios';
    protected $primaryKey = 'id';
    protected $fillable =['tipo','nombre','distrito_id','estado'];

    public function beneficiarios(){
        return $this->hasMany(Beneficiario::class, 'barrio_id', 'id');
    }

    public function distrito(){
        return $this->belongsTo(Distrito::class, 'distrito_id');
    }
}
