<?php

namespace App\Imports;

use App\Models\Barrio;
use App\Models\Beneficiario;
use App\Models\Entrega;
use Maatwebsite\Excel\Concerns\ToModel;

class EntregasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    protected $entrega;
    public function __construct($entrega)
    {
        $this->entrega = $entrega;
    }

    public function model(array $row)
    {
        $buscarbarrio = ["BARRIO ", "COMUNIDAD "];
        $buscarCI = [" TJA", " PND", " BN"," CBBA"," LPZ", " ORU", " SCZ"," PTS"," SC"];
        $barrio = str_replace($buscarbarrio, "", $row[2]);
        $barrio_id = Barrio::where('nombre','=', $barrio)->first()->id;
        $ci = str_replace($buscarCI, "", $row[6]);
        $beneficiario = Beneficiario::where('ci','=', $ci)->first();
        // print_r($beneficiario);
        try{
            return new Entrega([
                'ano' => 2024,
                'entrega' => $this->entrega,
                'nombre_completo' => $row[3]. ' ' . $row[4]. ' '. $row[5],
                'ci' => $ci,
                'estado' => $row[10],
                'beneficiario_id' => $beneficiario->id,
                'barrio_id' => $barrio_id,
            ]);
        }catch(\Exception $e){
            print_r($e->getMessage() . ' - ' . $row[6]);
        }

    }
}
