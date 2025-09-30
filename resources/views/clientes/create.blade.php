@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Nuevo Cliente</h2>
    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf
        <div class="mb-3"><label>Nombre</label><input type="text" name="nombre" class="form-control"></div>
        <div class="mb-3"><label>Apellido</label><input type="text" name="apellido" class="form-control"></div>
        <div class="mb-3"><label>Teléfono</label><input type="text" name="telefono" class="form-control"></div>
        <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control"></div>
        <div class="mb-3"><label>Dirección</label><input type="text" name="direccion" class="form-control"></div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
