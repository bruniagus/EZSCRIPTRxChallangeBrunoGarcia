<?php

namespace App\Http\Controllers;


use App\{Libro,Autor,Inventario};
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::all();
        return view('libros.index', compact('libros'));
    }

    public function create()
    {
        $autores = Autor::all();
        return view('libros.create', compact('autores'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required',
            'autor_id' => 'required|exists:autores,id',
        ]);

        $libro = Libro::create($data);

        Inventario::create([
            'libro_id' => $libro->id,
            'total_ejemplares' => 0,
            'ejemplares_disponibles' => 0,
        ]);

        return redirect()->route('libros.index')->with('success', 'Libro creado exitosamente.');
    }

    public function edit(Libro $libro)
    {
        $autores = Autor::all();
        return view('libros.edit', compact('libro', 'autores'));
    }

    public function update(Request $request, Libro $libro)
    {
        $data = $request->validate([
            'titulo' => 'required',
            'autor_id' => 'required|exists:autores,id',
        ]);

        $libro->update($data);

        return redirect()->route('libros.index')->with('success', 'Libro actualizado exitosamente.');
    }

    public function destroy(Libro $libro)
    {
        $libro->delete();

        return redirect()->route('libros.index')->with('success', 'Libro eliminado exitosamente.');
    }
}
