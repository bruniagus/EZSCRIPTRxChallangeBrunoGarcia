@extends('layouts.app')

@section('content')
    <h1>Socios Disponibles</h1>

    @if (count($sociosDisponibles) > 0)
        <ul>
            @foreach ($sociosDisponibles as $socio)
                <li>
                    {{ $socio->nombre }} {{ $socio->apellido }}
                    <input type="hidden" name="socio_id" value="{{ $socio->id }}">
                    <a href="{{ route('socios.prestamo', $socio->id) }}" class="btn btn-sm btn-primary">Solicitar Préstamo</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No hay socios disponibles.</p>
    @endif
@endsection