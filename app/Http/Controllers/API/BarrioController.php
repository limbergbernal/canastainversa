<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Barrio;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BarrioController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $barrio = Barrio::join('distritos', 'barrios.distrito_id', '=', 'distritos.id')
            ->select('barrios.*', 'distritos.distrito as distrito_nombre');
            return DataTables::of($barrio)
            ->addColumn('distrito', function($barrio){
                return $barrio->distrito_nombre ?? 'Sin Distrito';
            })
            ->addColumn('estado', function($barrio){
                return ($barrio->estado) ? '<span class="badge badge-success">Habilitado</span>': '<span class="badge badge-danger">Deshabilitado</span>';
            })
            ->addColumn('acciones', function($barrio){
                return '<button class="btn btn-sm btn-primary">Editar</button>';
            })
            ->rawColumns(['acciones','estado'])
            ->make(true);
        }
    }
}
