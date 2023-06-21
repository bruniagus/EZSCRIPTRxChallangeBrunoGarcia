
@extends('layouts.app')

@section('content')
    <h1>Crear Libro</h1>

    <form action="{{ route('libros.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="autor_id">Autor:</label>
            <select name="autor_id" id="autor_id" class="form-control" required>
                @foreach ($autores as $autor)
                    <option value="{{ $autor->id }}">{{ $autor->nombre }} {{ $autor->apellido }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Crear Libro</button>
    </form>
@endsection