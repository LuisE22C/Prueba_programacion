@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Equipo</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('equipos.update', $equipo->id_equipo) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_marca" class="form-label">Marca</label>
            <select name="id_marca" id="id_marca" class="form-select" required>
                @foreach($marcas as $marca)
                    <option value="{{ $marca->id_marca }}" {{ $marca->id_marca == $equipo->id_marca ? 'selected' : '' }}>
                        {{ $marca->nombre_marca }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tipo_equipo" class="form-label">Tipo de Equipo</label>
            <input type="text" name="tipo_equipo" id="tipo_equipo" class="form-control" value="{{ $equipo->tipo_equipo }}" required>
        </div>

        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" name="modelo" id="modelo" class="form-control" value="{{ $equipo->modelo }}">
        </div>

        <div class="mb-3">
            <label for="serie" class="form-label">Número de Serie</label>
            <input type="text" name="serie" id="serie" class="form-control" value="{{ $equipo->serie }}">
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control">{{ $equipo->descripcion }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('equipos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
