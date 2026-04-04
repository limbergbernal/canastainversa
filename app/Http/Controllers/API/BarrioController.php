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
                $botones = '';
                // if(auth()->user()->role === 'admin'){
                //     $botones .= '<button class="btn btn-sm btn-primary" data-id="'.$barrio->id.'"><span class="fa fa-edit"></span></button>';
                // }
                // if(auth()->user()->role === 'admin'){
                //     $botones .= '<button class="btn btn-sm btn-danger" data-id="'.$barrio->id.'"><span class="fa fa-trash"></span></button>';
                // }
                $botones .= '<button class="btn btn-sm btn-primary mr-1 edit-btn" data-id="'.$barrio->id.'"><span class="fa fa-edit"></span></button>';
                $botones .= '<button class="btn btn-sm btn-danger" data-id="'.$barrio->id.'"><span class="fa fa-trash"></span></button>';

                return $botones;
            })
            ->rawColumns(['acciones','estado'])
            ->make(true);
        }
    }
    public function show(Request $request,$id){
        if($request->ajax()){
            $barrio = Barrio::find($id);
            if($barrio){
                return response()->json($barrio);
            }
            else{
                return response()->json(['message' => 'Barrio no encontrado'], 404);
            }
        }
    }
}
