<?php

namespace Database\Seeders;

use App\Imports\EntregasImport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class EntregaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Excel::import(new EntregasImport('1RA ENTREGA 2024'), database_path('seeders/data/1ra_entrega_2024.xlsx'));
        // Excel::import(new EntregasImport('2DA ENTREGA 2024'), database_path('seeders/data/2da_entrega_2024.xlsx'));
        // Excel::import(new EntregasImport('3RA ENTREGA 2024'), database_path('seeders/data/3ra_entrega_2024.xlsx'));
        // Excel::import(new EntregasImport('4TA ENTREGA 2024'), database_path('seeders/data/4ta_entrega_2024.xlsx'));
        // Excel::import(new EntregasImport('5TA ENTREGA 2024'), database_path('seeders/data/5ta_entrega_2024.xlsx'));
        // Excel::import(new EntregasImport('6TA ENTREGA 2024'), database_path('seeders/data/6ta_entrega_2024.xlsx'));
        // Excel::import(new EntregasImport('7MA ENTREGA 2024'), database_path('seeders/data/7ma_entrega_2024.xlsx'));

        Excel::import(new EntregasImport('1RA ENTREGA 2025'), database_path('seeders/data/1RA_ENTREGA_2025.xlsx'));
        Excel::import(new EntregasImport('2DA ENTREGA 2025'), database_path('seeders/data/2DA_ENTREGA_2025.xlsx'));
        Excel::import(new EntregasImport('3RA ENTREGA 2025'), database_path('seeders/data/3RA_ENTREGA_2025.xlsx'));
    }
}
