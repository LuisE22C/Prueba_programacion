@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Servicio</h1>

    <form action="{{ route('servicios.update', $servicio->id_servicio) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-select" required>
                <option value="recibido" {{ $servicio->estado == 'recibido' ? 'selected' : '' }}>Recibido</option>
                <option value="reparando" {{ $servicio->estado == 'reparando' ? 'selected' : '' }}>Reparando</option>
                <option value="finalizado" {{ $servicio->estado == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
                <option value="entregado" {{ $servicio->estado == 'entregado' ? 'selected' : '' }}>Entregado</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_entrega" class="form-label">Fecha de Entrega</label>
            <input type="date" name="fecha_entrega" id="fecha_entrega" class="form-control" value="{{ $servicio->fecha_entrega }}">
        </div>

        <div class="mb-3">
            <label for="diagnostico" class="form-label">Diagnóstico</label>
            <textarea name="diagnostico" id="diagnostico" class="form-control">{{ $servicio->diagnostico }}</textarea>
        </div>

        <div class="mb-3">
            <label for="solucion" class="form-label">Solución</label>
            <textarea name="solucion" id="solucion" class="form-control">{{ $servicio->solucion }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('servicios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
