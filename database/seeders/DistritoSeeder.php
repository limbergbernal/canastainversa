<?php

namespace Database\Seeders;

use App\Imports\DistritosImport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

;

class DistritoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Excel::import(new DistritosImport, database_path('seeders/data/distritos.xlsx'));
    }
}
