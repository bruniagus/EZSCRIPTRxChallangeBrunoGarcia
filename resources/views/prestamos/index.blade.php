@extends('layouts.app')

@section('content')
    <h1>Lista de Préstamos</h1>

    @if (count($prestamos) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Socio</th>
                    <th>Libro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prestamos as $prestamo)
                    <tr>
                        <td>{{ $prestamo->socio->nombre }} {{ $prestamo->socio->apellido }}</td>
                        <td>{{ $prestamo->libro->titulo }}</td>
                        <td>
                            <form action="{{ route('prestamos.destroy', $prestamo->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay préstamos registrados.</p>
    @endif
@endsection