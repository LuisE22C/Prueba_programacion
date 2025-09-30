@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Servicio</h1>

    <table class="table table-striped">
        <tr><th>ID Servicio:</th><td>{{ $servicio->id_servicio }}</td></tr>
        <tr><th>Cliente:</th><td>{{ $servicio->cliente_nombre }} {{ $servicio->cliente_apellido }}</td></tr>
        <tr><th>Técnico:</th><td>{{ $servicio->tecnico_nombre }} {{ $servicio->tecnico_apellido }}</td></tr>
        <tr><th>Equipo:</th><td>{{ $servicio->nombre_marca }} - {{ $servicio->tipo_equipo }} ({{ $servicio->modelo }})</td></tr>
        <tr><th>Estado:</th><td>{{ ucfirst($servicio->estado) }}</td></tr>
        <tr><th>Fecha Recepción:</th><td>{{ $servicio->fecha_recepcion }}</td></tr>
        <tr><th>Fecha Entrega:</th><td>{{ $servicio->fecha_entrega ?? 'No entregado' }}</td></tr>
        <tr><th>Problema Reportado:</th><td>{{ $servicio->problema_reportado }}</td></tr>
        <tr><th>Diagnóstico:</th><td>{{ $servicio->diagnostico ?? 'Pendiente' }}</td></tr>
        <tr><th>Solución:</th><td>{{ $servicio->solucion ?? 'Pendiente' }}</td></tr>
    </table>

    <a href="{{ route('servicios.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
