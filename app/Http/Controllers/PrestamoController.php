<?php

namespace App\Http\Controllers;

use App\{Prestamo,Inventario};

class PrestamoController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::with('socio', 'libro')->get();

        return view('prestamos.index', compact('prestamos'));
    }

    public function destroy(Prestamo $prestamo)
    {

        $libro = $prestamo->libro;

        $prestamo->delete();

        $inventario = Inventario::where('libro_id', $libro->id)->first();
        $inventario->ejemplares_disponibles += 1;
        $inventario->save();

        return redirect()->route('prestamos.index')->with('success', 'Préstamo eliminado correctamente.');
    }
}