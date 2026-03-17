<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Beneficiario;


class DashboardController extends Controller
{
    public function index(){
        $beneficiarios = Beneficiario::where('estado', 'BAJA')
                ->whereHas('entregas', function ($query) {
                    $query->where('entrega', '6TA ENTREGA 2024')
                        ->where('estado', 'NO ENTREGADO');
                })
                ->get();
        // dd($beneficiarios);
        return view('dashboard', compact('beneficiarios'));
    }
}
