@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Marca</h1>

    <!-- Mostrar errores de validación -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('marcas.update', $marca->id_marca) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre_marca" class="form-label">Nombre de la Marca</label>
            <input 
                type="text" 
                name="nombre_marca" 
                id="nombre_marca" 
                class="form-control" 
                value="{{ old('nombre_marca', $marca->nombre_marca) }}" 
                required
            >
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('marcas.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
