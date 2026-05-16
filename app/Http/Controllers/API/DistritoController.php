<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Distrito;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DistritoController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $distrito = Distrito::query();
            return DataTables::of($distrito)
            ->addColumn('distrito', function($distrito){
                return 'Distrito ' . $distrito->numero ?? 'Sin Distrito';
            })
            ->addColumn('estado', function($distrito){
                return ($distrito->estado) ? '<span class="badge badge-success">Habilitado</span>': '<span class="badge badge-danger">Deshabilitado</span>';
            })
            ->addColumn('acciones', function($distrito){
                $botones = '';
                // if(auth()->user()->role === 'admin'){
                //     $botones .= '<button class="btn btn-sm btn-primary" data-id="'.$barrio->id.'"><span class="fa fa-edit"></span></button>';
                // }
                // if(auth()->user()->role === 'admin'){
                //     $botones .= '<button class="btn btn-sm btn-danger" data-id="'.$barrio->id.'"><span class="fa fa-trash"></span></button>';
                // }
                $botones .= '<button class="btn btn-sm btn-primary mr-1 edit-btn" data-id="'.$distrito->id.'"><span class="fa fa-edit"></span></button>';
                $botones .= '<button class="btn btn-sm btn-danger" data-id="'.$distrito->id.'"><span class="fa fa-trash"></span></button>';

                return $botones;
            })
            ->rawColumns(['acciones','estado'])
            ->make(true);
        }
    }

    public function show(Request $request, $id){
        $distrito = Distrito::find($id);
        if($distrito){
            return response()->json($distrito);
        }else{
            return response()->json(['message' => 'Distrito no encontrado'], 404);
        }
    }
    
}
