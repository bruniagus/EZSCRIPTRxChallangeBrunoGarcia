@extends('layouts.app')

@section('content')
    <h1>Listado de Autores</h1>
    <a href="{{ route('autores.create') }}" class="btn btn-primary">Crear Autor</a>

    @if (count($autores) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($autores as $autor)
                    <tr>
                        <td>{{ $autor->nombre }}</td>
                        <td>{{ $autor->apellido }}</td>
                        <td>
                            <a href="{{ route('autores.edit', $autor->id) }}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{ route('autores.destroy', $autor->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este autor?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay autores registrados.</p>
    @endif
@endsection