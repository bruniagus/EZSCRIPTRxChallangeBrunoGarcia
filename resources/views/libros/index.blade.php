@extends('layouts.app')

@section('content')
    <h1>Listado de Libros</h1>
    <a href="{{ route('libros.create') }}" class="btn btn-primary">Crear Libro</a>

    @if (count($libros) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($libros as $libro)
                    <tr>
                        <td>{{ $libro->titulo }}</td>
                        <td>{{ $libro->autor->nombre }} {{ $libro->autor->apellido }}</td>
                        <td>
                            <a href="{{ route('libros.edit', $libro->id) }}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este libro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay libros registrados.</p>
    @endif
@endsection