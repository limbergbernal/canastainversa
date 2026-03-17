<?php

namespace App\Imports;

use App\Models\Barrio;
use App\Models\Beneficiario;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class BeneficiariosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // $distrito_id = Distrito::where('numero','=', $row[3])->first()->id;
        $barrio_id = Barrio::where('nombre','=', $row[2])->first()->id;
        return new Beneficiario([
            'nombre_completo' => $row[3],
            'ci' => $row[6],
            'civil' => $row[4],
            'expedido' => $row[7],
            'sexo' => $row[8],
            'fecha_nac' => Carbon::createFromFormat('d/m/Y', $row[9])->format('Y-m-d'),
            'inscripcion' => $row[11],
            'profesion' => $row[12],
            'firma' => 'SI',
            'direccion' => $row[14],
            'ocupacion' => $row[13],
            'celular' => $row[15],
            'estado' => $row[16],
            'barrio_id' => $barrio_id,
        ]);
    }
}
