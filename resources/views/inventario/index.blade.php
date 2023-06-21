@extends('layouts.app')

@section('content')
    <h1>Inventario de Libros</h1>

    @if (count($inventario) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Libro</th>
                    <th>Ejemplares en Total</th>
                    <th>Ejemplares Disponibles</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inventario as $item)
                    <tr>
                        <td>{{ $item->libro->titulo }}</td>
                        <td>{{ $item->total_ejemplares }}</td>
                        <td>{{ $item->ejemplares_disponibles }}</td>
                        <td>
                            <a href="{{ route('inventario.edit', $item->id) }}" class="btn btn-primary">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay libros en el inventario.</p>
    @endif
@endsection