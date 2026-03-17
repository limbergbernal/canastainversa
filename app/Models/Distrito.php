<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;
    protected $table = 'distritos';
    protected $primaryKey = 'id';
    protected $fillable =['distrito','numero','estado'];

    public function barrios(){
        return $this->hasMany(Barrio::class, 'distrito_id', 'id');
    }
}
