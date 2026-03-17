<?php

namespace Database\Seeders;

use App\Imports\BeneficiariosImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class BeneficiarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Excel::import(new BeneficiariosImport, database_path('seeders/data/beneficiarios.xlsx'));
    }
}
