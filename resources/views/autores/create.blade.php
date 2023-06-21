@extends('layouts.app')

@section('content')
    <h1>Crear Autor</h1>

    <form action="{{ route('autores.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Crear Autor</button>
    </form>
@endsection