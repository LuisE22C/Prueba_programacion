@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Nuevo Servicio</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('servicios.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_cliente" class="form-label">Cliente</label>
            <select name="id_cliente" id="id_cliente" class="form-select" required>
                <option value="">Seleccione un cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }} {{ $cliente->apellido }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_equipo" class="form-label">Equipo</label>
            <select name="id_equipo" id="id_equipo" class="form-select" required>
                <option value="">Seleccione un equipo</option>
                @foreach($equipos as $equipo)
                    <option value="{{ $equipo->id_equipo }}">{{ $equipo->nombre_equipo }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_tecnico" class="form-label">Técnico</label>
            <select name="id_tecnico" id="id_tecnico" class="form-select" required>
                <option value="">Seleccione un técnico</option>
                @foreach($tecnicos as $tecnico)
                    <option value="{{ $tecnico->id_tecnico }}">{{ $tecnico->nombre }} {{ $tecnico->apellido }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_recepcion" class="form-label">Fecha de Recepción</label>
            <input type="date" name="fecha_recepcion" id="fecha_recepcion" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="problema_reportado" class="form-label">Problema Reportado</label>
            <textarea name="problema_reportado" id="problema_reportado" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('servicios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
