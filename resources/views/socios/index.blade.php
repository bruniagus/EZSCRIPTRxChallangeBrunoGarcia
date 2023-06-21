@extends('layouts.app')

@section('content')
    <h1>Listado de Socios</h1>
    <a href="{{ route('socios.create') }}" class="btn btn-primary">Crear Socio</a>

    @if (count($socios) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Número Socio</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($socios as $socio)
                    <tr>
                        <td>{{ $socio->numero_socio }}</td>
                        <td>{{ $socio->nombre }}</td>
                        <td>{{ $socio->apellido }}</td>
                        <td>{{ $socio->telefono }}</td>
                        <td>
                            <a href="{{ route('socios.edit', $socio->id) }}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{ route('socios.destroy', $socio->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este socio?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay socios registrados.</p>
    @endif
@endsection