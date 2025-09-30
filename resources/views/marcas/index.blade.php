@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Marcas</h1>
    <a href="{{ route('marcas.create') }}" class="btn btn-primary mb-3">Nueva Marca</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Marca</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($marcas as $marca)
            <tr>
                <td>{{ $marca->id_marca }}</td>
                <td>{{ $marca->nombre_marca }}</td>
                <td>
                    <a href="{{ route('marcas.edit', $marca->id_marca) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('marcas.destroy', $marca->id_marca) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar esta marca?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
