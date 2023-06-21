@extends('layouts.app')

@section('content')
    <h1>Editar Libro</h1>

    <form action="{{ route('libros.update', $libro->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ $libro->titulo }}" required>
        </div>

        <div class="form-group">
            <label for="autor_id">Autor:</label>
            <select name="autor_id" id="autor_id" class="form-control" required>
                @foreach ($autores as $autor)
                    <option value="{{ $autor->id }}" {{ $autor->id == $libro->autor_id ? 'selected' : '' }}>{{ $autor->nombre }} {{ $autor->apellido }}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Actualizar Libro</button>
    </form>
@endsection