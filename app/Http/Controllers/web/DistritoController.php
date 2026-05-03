<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Distrito;
use Illuminate\Http\Request;

class DistritoController extends Controller
{
    public function index(){
        $distritos = Distrito::orderBy('distrito', 'ASC')->get();
        return view('dashboard.distrito.index', compact('distritos'));
    }
}
