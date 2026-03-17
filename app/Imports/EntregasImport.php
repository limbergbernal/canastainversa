<?php

namespace App\Imports;

use App\Models\Entrega;
use Maatwebsite\Excel\Concerns\ToModel;

class EntregasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Entrega([
            'ano' => 2024,
            'entrega' => 1,
            'nombre_completo' => $row['NOMBRE_COMPLETO'],
            'ci' => $row['CI'],
            'estado' => $row['ESTADO'],
            'beneficiario_id' => $row['BENEFICIARIO_ID'],
            'barrio_id' => $row['BARRIO_ID']
        ]);
    }
}
