<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventario;

class InventarioController extends Controller
{
    public function index()
    {
        $inventario = Inventario::all();

        return view('inventario.index', compact('inventario'));
    }

    public function edit($id)
    {
        $inventario = Inventario::findOrFail($id);

        return view('inventario.editar-inventario', compact('inventario'));
    }

    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'ejemplares_disponibles' => 'required|integer',
            'total_ejemplares' => 'required|integer',
        ]);
     
        if ($data["ejemplares_disponibles"] > $data["total_ejemplares"]) {
            return redirect()->back()->withErrors('El número de ejemplares disponibles no puede ser mayor que el número de ejemplares totales.');
        }

        $inventario = Inventario::findOrFail($id);

        $inventario->total_ejemplares = $data["total_ejemplares"];
        $inventario->ejemplares_disponibles = $data["ejemplares_disponibles"];

        $inventario->save();

        return redirect()->route('inventario.index')->with('success', 'Inventario actualizado correctamente.');
    }
}