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
            $barrio = Barrio::with('distrito')->orderBy('nombre','ASC');
            return DataTables::of($barrio)
            ->addColumn('distrito', function($barrio){
                return $barrio->distrito->distrito ?? 'Sin Distrito';
            })
            ->addColumn('acciones', function($barrio){
                return '<button class="btn btn-sm btn-primary">Editar</button>';
            })
            ->rawColumns(['acciones'])
            ->make(true);
        }
    }
}
