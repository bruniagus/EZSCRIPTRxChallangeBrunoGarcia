<?php

namespace App\Http\Controllers;

use App\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index()
    {
        $autores = Autor::all();
        return view('autores.index', compact('autores'));
    }

    public function create()
    {
        return view('autores.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
        ]);

        Autor::create($data);

        return redirect()->route('autores.index')->with('success', 'Autor creado exitosamente.');
    }

    public function edit(Autor $autor)
    {
        $autor = $autor->first();
        return view('autores.edit', compact('autor'));
    }

    public function update(Request $request, Autor $autor)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
        ]);

        $autor->update($data);

        return redirect()->route('autores.index')->with('success', 'Autor actualizado exitosamente.');
    }

    public function destroy(Autor $autor)
    {
        $autor->delete();

        return redirect()->route('autores.index')->with('success', 'Autor eliminado exitosamente.');
    }
}
