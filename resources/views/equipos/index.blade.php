@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Equipos</h1>

    <a href="{{ route('equipos.create') }}" class="btn btn-primary mb-3">Nuevo Equipo</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(count($equipos) > 0)
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Tipo</th>
                <th>Modelo</th>
                <th>Serie</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equipos as $equipo)
            <tr>
                <td>{{ $equipo->id_equipo }}</td>
                <td>{{ $equipo->nombre_marca }}</td>
                <td>{{ $equipo->tipo_equipo }}</td>
                <td>{{ $equipo->modelo }}</td>
                <td>{{ $equipo->serie }}</td>
                <td>{{ $equipo->descripcion }}</td>
                <td>
                    <a href="{{ route('equipos.edit', $equipo->id_equipo) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('equipos.destroy', $equipo->id_equipo) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este equipo?')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <div class="alert alert-info">No hay equipos registrados.</div>
    @endif
</div>
@endsection
