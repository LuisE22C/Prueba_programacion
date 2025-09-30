@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Nuevo Equipo</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('equipos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_marca" class="form-label">Marca</label>
            <select name="id_marca" id="id_marca" class="form-select" required>
                <option value="">Seleccione una marca</option>
                @foreach($marcas as $marca)
                    <option value="{{ $marca->id_marca }}">{{ $marca->nombre_marca }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tipo_equipo" class="form-label">Tipo de Equipo</label>
            <input type="text" name="tipo_equipo" id="tipo_equipo" class="form-control" placeholder="Ejemplo: Laptop, Smartphone" required>
        </div>

        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" name="modelo" id="modelo" class="form-control">
        </div>

        <div class="mb-3">
            <label for="serie" class="form-label">Número de Serie</label>
            <input type="text" name="serie" id="serie" class="form-control">
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('equipos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
