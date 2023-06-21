@extends('layouts.app')

@section('content')
    <h1>Editar Autor</h1>

    <form action="{{ route('autores.update', $autor->id) }}" method="PUT">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $autor->nombre }}" required>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido" class="form-control" value="{{ $autor->apellido }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Autor</button>
    </form>
@endsection