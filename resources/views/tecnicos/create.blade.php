@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Nuevo Técnico</h1>

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

    <form action="{{ route('tecnicos.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input 
                    type="text" 
                    name="nombre" 
                    id="nombre" 
                    class="form-control" 
                    placeholder="Ejemplo: Carlos" 
                    value="{{ old('nombre') }}" 
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
                    placeholder="Ejemplo: Gómez" 
                    value="{{ old('apellido') }}" 
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
                placeholder="Ejemplo: Laptops, Celulares, Impresoras..." 
                value="{{ old('especialidad') }}"
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
                    placeholder="555-1234" 
                    value="{{ old('telefono') }}"
                >
            </div>

            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    class="form-control" 
                    placeholder="ejemplo@mail.com" 
                    value="{{ old('email') }}"
                >
            </div>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('tecnicos.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
