@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Servicios</h1>

    <a href="{{ route('servicios.create') }}" class="btn btn-primary mb-3">Nuevo Servicio</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(count($servicios) > 0)
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Equipo</th>
                <th>Estado</th>
                <th>Fecha Recepción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($servicios as $servicio)
            <tr>
                <td>{{ $servicio->id_servicio }}</td>
                <td>{{ $servicio->cliente }}</td>
                <td>{{ $servicio->tipo_equipo }}</td>
                <td>{{ ucfirst($servicio->estado) }}</td>
                <td>{{ $servicio->fecha_recepcion }}</td>
                <td>
                    <a href="{{ route('servicios.show', $servicio->id_servicio) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('servicios.edit', $servicio->id_servicio) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('servicios.destroy', $servicio->id_servicio) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este servicio?')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <div class="alert alert-info">No hay servicios registrados.</div>
    @endif
</div>
@endsection
