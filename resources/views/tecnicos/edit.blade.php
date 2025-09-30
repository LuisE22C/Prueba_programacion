@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Técnico</h1>

    <!-- Errores de validación -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tecnicos.update', $tecnico->id_tecnico) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input 
                    type="text" 
                    name="nombre" 
                    id="nombre" 
                    class="form-control" 
                    value="{{ old('nombre', $tecnico->nombre) }}" 
                    required
                >
            </div>

            <div class="col-md-6 mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input 
                    type="text" 
                    name="apellido" 
                    id="apellido" 
                    class="form-control" 
                    value="{{ old('apellido', $tecnico->apellido) }}" 
                    required
                >
            </div>
        </div>

        <div class="mb-3">
            <label for="especialidad" class="form-label">Especialidad</label>
            <input 
                type="text" 
                name="especialidad" 
                id="especialidad" 
                class="form-control" 
                value="{{ old('especialidad', $tecnico->especialidad) }}"
            >
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input 
                    type="text" 
                    name="telefono" 
                    id="telefono" 
                    class="form-control" 
                    value="{{ old('telefono', $tecnico->telefono) }}"
                >
            </div>

            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    class="form-control" 
                    value="{{ old('email', $tecnico->email) }}"
                >
            </div>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('tecnicos.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
