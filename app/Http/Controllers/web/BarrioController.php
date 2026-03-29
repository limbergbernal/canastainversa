<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Barrio;
use Illuminate\Http\Request;

class BarrioController extends Controller
{
    public function index(){
        $barrios = Barrio::orderBy('nombre','ASC')->get();
        return view('dashboard.barrio.index', compact('barrios'));
    }
}
