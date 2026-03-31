<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Barrio;
use App\Models\Beneficiario;
use App\Models\Entrega;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function getReporteBeneficiarios(Request $request){
        $barrio_id = $request->barrio_id;
        // $entregasSelecionadas = ["1RA ENTREGA 2024","2DA ENTREGA 2024","3RA ENTREGA 2024","4TA ENTREGA 2024","5TA ENTREGA 2024","6TA ENTREGA 2024","7MA ENTREGA 2024"];
        $entregasSelecionadas = ["1RA ENTREGA 2025","2DA ENTREGA 2025","3RA ENTREGA 2025"];
        $entrega = Entrega::whereIn('entrega', $entregasSelecionadas)->where('barrio_id', $barrio_id)->distinct('beneficiario_id')->get('beneficiario_id');
        $beneficiarios = Beneficiario::with(['entregas' => function ($q) use ($entregasSelecionadas, $barrio_id){
            $q->whereIn('entrega', $entregasSelecionadas)->whereIn('estado', ['ENTREGADO','RESAGADO'])->where('barrio_id', $barrio_id);
        }])
        ->whereIn('id', $entrega->pluck('beneficiario_id'))
        ->orderBy('nombre_completo')
        ->get();
        return response()->json($beneficiarios);

        // dd($request->barrio_id);
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
        // $barrios = Barrio::where('estado','HABILITADO')->get(['id','nombre']);
        // $entregasSelecionadas = ["1RA ENTREGA 2024","2DA ENTREGA 2024","3RA ENTREGA 2024","4TA ENTREGA 2024","5TA ENTREGA 2024","6TA ENTREGA 2024","7MA ENTREGA 2024"];
        // dd($entrega);
        // return view("reportes.index", compact('entrega', 'barrios'));
        }
    public function getReporteCi($ci){
        // $entregasSelecionadas = ["1RA ENTREGA 2024","2DA ENTREGA 2024","3RA ENTREGA 2024","4TA ENTREGA 2024","5TA ENTREGA 2024","6TA ENTREGA 2024","7MA ENTREGA 2024"];
        $entregasSelecionadas = ["1RA ENTREGA 2025","2DA ENTREGA 2025","3RA ENTREGA 2025"];
        $beneficiario = Beneficiario::with(['entregas' => function ($q) use ($entregasSelecionadas){
            $q->whereIn('entrega', $entregasSelecionadas)->whereIn('estado', ['ENTREGADO','RESAGADO'])->with('barrio');;
        }])->where('ci', $ci)->first();
        return response()->json($beneficiario);
    }

    public function getReporteDistrito(Request $request){
        $distrito_id = $request->input('distrito_id');
        $barriosNombres = Barrio::where('distrito_id', $distrito_id)->orderBy('nombre','ASC')->get(['id','nombre']);
        $barrios = Barrio::where('distrito_id', $distrito_id)->get('id');
        $entregasSelecionadas = ["1RA ENTREGA 2025","2DA ENTREGA 2025","3RA ENTREGA 2025"];

        $ids_beneficiarios = Entrega::whereIn('entrega', $entregasSelecionadas)->whereIn('barrio_id', $barrios)->distinct('beneficiario_id')->get('beneficiario_id');
        $beneficiarios = Beneficiario::with(['entregas' => function ($q) use ($entregasSelecionadas, $barrios){
            $q->whereIn('entrega', $entregasSelecionadas)->whereIn('estado', ['ENTREGADO','RESAGADO'])->whereIn('barrio_id', $barrios);
        }])
        ->whereIn('id', $ids_beneficiarios->pluck('beneficiario_id'))
        ->orderBy('nombre_completo')
        ->get();

        return response()->json(['barrios'=> $barriosNombres, 'beneficiarios' => $beneficiarios]);

    }
}
