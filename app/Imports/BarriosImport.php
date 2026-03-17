<?php

namespace App\Imports;

use App\Models\Barrio;
use App\Models\Distrito;
use Maatwebsite\Excel\Concerns\ToModel;

class BarriosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $distrito_id = Distrito::where('numero','=', $row[3])->first()->id;
        return new Barrio([
            'tipo' => $row[1],
            'nombre' => $row[2],
            'distrito_id' => $distrito_id,
            'estado' => $row[4]
        ]);
    }
}
