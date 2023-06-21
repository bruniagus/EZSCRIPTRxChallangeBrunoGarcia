@extends('layouts.app')

@section('content')
    <h1>Realizar Préstamo</h1>

    <form action="{{ route('socios.guardarPrestamo', $socio->id) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="libro_id">Libro</label>
            <select name="libro_id" id="libro_id" class="form-control">
                <option value="">Seleccione un libro</option>
                @foreach ($libros as $libro)
                    <option value="{{ $libro->id }}">{{ $libro->titulo }}</option>
                @endforeach
            </select>
            @error('libro_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Realizar Préstamo</button>
    </form>
@endsection