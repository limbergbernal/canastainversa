<?php

namespace Database\Seeders;

use App\Imports\BarriosImport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class BarrioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Excel::import(new BarriosImport, database_path('seeders/data/barrios.xlsx'));
    }
}
