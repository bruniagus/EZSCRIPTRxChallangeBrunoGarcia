<?php

namespace App\Http\Controllers;

use App\{Socio,Libro,Inventario};
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class SocioController extends Controller
{
    public function index()
    {
        $socios = Socio::all();
        return view('socios.index', compact('socios'));
    }

    public function create()
    {
        return view('socios.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'numero_socio' => 'required|unique:socios',
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'limite_prestamos' => 'nullable|integer',
            'activo' => 'nullable|boolean',
        ]);

        Socio::create($data);

        return redirect()->route('socios.index')->with('success', 'Socio creado exitosamente.');
    }

    public function edit(Socio $socio)
    {
        return view('socios.edit', compact('socio'));
    }

    public function update(Request $request, Socio $socio)
    {
        $data = $request->validate([
            'numero_socio' => 'required|unique:socios,numero_socio,' . $socio->id,
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'limite_prestamos' => 'nullable|integer',
            'activo' => 'nullable|boolean',
        ]);

        $socio->update($data);

        return redirect()->route('socios.index')->with('success', 'Socio actualizado exitosamente.');
    }

    public function destroy(Socio $socio)
    {
        $librosPrestados = $socio->libros;

        $socio->delete();

        foreach ($librosPrestados as $libro) {
            $inventario = Inventario::where('libro_id', $libro->id)->first();
            $inventario->ejemplares_disponibles += 1;
            $inventario->save();
        }

        return redirect()->route('socios.index')->with('success', 'Socio eliminado exitosamente.');
    }

    public function prestamo(Socio $socio)
    {
        $libros = Libro::whereHas('inventario', function (Builder $query) {
            $query->where('ejemplares_disponibles', '>', '0');
        })->get();
 
        return view('socios.prestamo', compact('socio', 'libros'));
    }

    public function guardarPrestamo(Request $request, Socio $socio)
    {
        $libroId = $request->input('libro_id');

        // Validar si el libro está disponible y el socio tiene espacio en su límite de préstamos

        $libro = Libro::with('inventario')->findOrFail($libroId);

        $inventario = $libro->inventario;
        
        if (!$inventario || $inventario->ejemplares_disponibles <= 0) {
            return back()->with('error', 'El libro seleccionado no está disponible para préstamo.');
        }
        if($socio->activo == 0) {
            return back()->with('error', 'El socio esta desactivado.');
        }
    
        if($socio->limite_prestamos != 0) {
            if ( $socio->limite_prestamos > 0 && $socio->libros->count() >= $socio->limite_prestamos ) {
                return back()->with('error', 'El socio ha alcanzado su límite de préstamos.');
            }
        }

        // Realizar el préstamo del libro al socio
        $socio->libros()->attach($libroId);
        // Actualizar la disponibilidad de ejemplares

        $inventario->decrement('ejemplares_disponibles');

        return redirect()->route('socios.index')->with('success', 'Préstamo realizado exitosamente.');
    }
}