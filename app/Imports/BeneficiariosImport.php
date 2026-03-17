<?php

namespace App\Imports;

use App\Models\Beneficiario;
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
        return new Beneficiario([
            //
        ]);
    }
}
