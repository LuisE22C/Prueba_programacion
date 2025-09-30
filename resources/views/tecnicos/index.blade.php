@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Técnicos</h1>

    <a href="{{ route('tecnicos.create') }}" class="btn btn-primary mb-3">Nuevo Técnico</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(count($tecnicos) > 0)
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Especialidad</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tecnicos as $tecnico)
            <tr>
                <td>{{ $tecnico->id_tecnico }}</td>
                <td>{{ $tecnico->nombre }}</td>
                <td>{{ $tecnico->apellido }}</td>
                <td>{{ $tecnico->especialidad }}</td>
                <td>{{ $tecnico->telefono }}</td>
                <td>{{ $tecnico->email }}</td>
                <td>
                    <a href="{{ route('tecnicos.edit', $tecnico->id_tecnico) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('tecnicos.destroy', $tecnico->id_tecnico) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button 
                            class="btn btn-danger btn-sm" 
                            onclick="return confirm('¿Seguro que deseas eliminar este técnico?')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <div class="alert alert-info">
            No hay técnicos registrados aún.
        </div>
    @endif
</div>
@endsection
