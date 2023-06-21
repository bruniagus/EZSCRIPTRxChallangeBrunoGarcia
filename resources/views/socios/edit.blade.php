@extends('layouts.app')

@section('content')
    <h1>Editar Socio</h1>

    <form action="{{ route('socios.update', $socio->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="numero_socio">Número Socio:</label>
            <input type="text" name="numero_socio" id="numero_socio" class="form-control" value="{{ $socio->numero_socio }}" required>
        </div>

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $socio->nombre }}" required>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido" class="form-control" value="{{ $socio->apellido }}" required>
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" id="telefono" class="form-control" value="{{ $socio->telefono }}" required>
        </div>

        <div class="form-group">
            <label for="limite_prestamos">Límite de Préstamos:</label>
            <input type="number" name="limite_prestamos" id="limite_prestamos" class="form-control" value="{{ $socio->limite_prestamos }}" min="0">
        </div>

        <div class="form-group">
            <label for="activo">Activo:</label>
            <select name="activo" id="activo" class="form-control" required>
                <option value="1" {{ $socio->activo ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ !$socio->activo ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Socio</button>
    </form>
@endsection