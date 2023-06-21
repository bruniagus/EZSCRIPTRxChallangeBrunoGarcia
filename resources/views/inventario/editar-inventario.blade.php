@extends('layouts.app')

@section('content')
    <h1>Editar Inventario</h1>

    <form action="{{ route('inventario.update', $inventario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="total_ejemplares">Ejemplares en Total:</label>
            <input type="number" name="total_ejemplares" id="total_ejemplares" class="form-control" value="{{ $inventario->total_ejemplares }}" required>
        </div>

        <div class="form-group">
            <label for="ejemplares_disponibles">Ejemplares Disponibles:</label>
            <input type="number" name="ejemplares_disponibles" id="ejemplares_disponibles" class="form-control" value="{{ $inventario->ejemplares_disponibles }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Inventario</button>
    </form>
@endsection