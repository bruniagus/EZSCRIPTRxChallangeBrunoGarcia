<?php

namespace App\Http\Controllers;

use App\Socio;

class IndexController extends Controller
{
    public function index()
    {
        $sociosDisponibles = Socio::where('activo', true)->get();

        return view('index', compact('sociosDisponibles'));
    }
}