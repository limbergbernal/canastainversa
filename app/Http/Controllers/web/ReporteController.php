<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Barrio;
use App\Models\Entrega;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function index(){

    // $personas = Persona::with(['entregas' => function ($q) {
    //     $q->whereYear('fecha', now()->year);
    // }])
    // ->withCount(['entregas' => function ($q) {
    //     $q->whereYear('fecha', now()->year);
    // }])
    // ->withSum(['entregas' => function ($q) {
    //     $q->whereYear('fecha', now()->year);
    // }], 'monto')
    // ->get();
        $barrios = Barrio::where('estado','HABILITADO')->get(['id','nombre']);
        $entregasSelecionadas = ["1RA ENTREGA 2024","2DA ENTREGA 2024","3RA ENTREGA 2024","4TA ENTREGA 2024","5TA ENTREGA 2024","6TA ENTREGA 2024","7MA ENTREGA 2024"];
        // $entrega = Entrega::whereIn('entrega', $entregasSelecionadas)->where('barrio_id', 7)->distinct('ci')->orderBy('nombre_completo')->get();
        // dd($entrega);
        return view("reportes.index", compact('barrios'));
    }
}
