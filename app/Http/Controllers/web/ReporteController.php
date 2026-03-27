<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Barrio;
use App\Models\Beneficiario;
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
        $barrios = Barrio::where('estado','HABILITADO')->orderBy('nombre','ASC')->get(['id','nombre']);
        $entregasSelecionadas = ["1RA ENTREGA 2024","2DA ENTREGA 2024","3RA ENTREGA 2024","4TA ENTREGA 2024","5TA ENTREGA 2024","6TA ENTREGA 2024","7MA ENTREGA 2024"];
        // $entrega = Entrega::whereIn('entrega', $entregasSelecionadas)->where('barrio_id', 7)->distinct('ci')->orderBy('nombre_completo')->get();
        // dd($entrega);
        return view("reportes.index", compact('barrios'));
    }

    public function getReporteNoEntregado(){
        $gestion = 2024;
        $entregasSelecionadas = ["1RA ENTREGA 2024","2DA ENTREGA 2024","3RA ENTREGA 2024","4TA ENTREGA 2024","5TA ENTREGA 2024","6TA ENTREGA 2024","7MA ENTREGA 2024"];
        $entrega = Entrega::whereIn('entrega', $entregasSelecionadas)->where('estado', 'NO ENTREGADO')->distinct('beneficiario_id')->get('beneficiario_id');
        $beneficiarios = Beneficiario::with(['entregas' => function ($q) use ($entregasSelecionadas){
            $q->whereIn('entrega', $entregasSelecionadas)->whereIn('estado', ['NO ENTREGADO']);
        }])
        ->whereIn('id', $entrega->pluck('beneficiario_id'))
        ->orderBy('nombre_completo')
        ->get();
        return view("reportes.reportenoentregado",compact('beneficiarios'));

    }

    public function reporteCi(){
        return view("reportes.reporteCi");
    }
}
