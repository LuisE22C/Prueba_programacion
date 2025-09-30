@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Panel de Administración - Taller de Servicios</h1>

    <div class="row g-3">
        <!-- Clientes -->
        <div class="col-md-3">
            <div class="card text-white bg-primary h-100">
                <div class="card-body">
                    <h5 class="card-title">Clientes</h5>
                    <p class="card-text">Administrar clientes del taller.</p>
                    <a href="{{ route('clientes.index') }}" class="btn btn-light btn-sm">Ir a Clientes</a>
                </div>
            </div>
        </div>

        <!-- Técnicos -->
        <div class="col-md-3">
            <div class="card text-white bg-success h-100">
                <div class="card-body">
                    <h5 class="card-title">Técnicos</h5>
                    <p class="card-text">Administrar técnicos del taller.</p>
                    <a href="{{ route('tecnicos.index') }}" class="btn btn-light btn-sm">Ir a Técnicos</a>
                </div>
            </div>
        </div>

        <!-- Marcas -->
        <div class="col-md-3">
            <div class="card text-white bg-warning h-100">
                <div class="card-body">
                    <h5 class="card-title">Marcas</h5>
                    <p class="card-text">Administrar marcas de equipos.</p>
                    <a href="{{ route('marcas.index') }}" class="btn btn-light btn-sm">Ir a Marcas</a>
                </div>
            </div>
        </div>

        <!-- Equipos -->
        <div class="col-md-3">
            <div class="card text-white bg-info h-100">
                <div class="card-body">
                    <h5 class="card-title">Equipos</h5>
                    <p class="card-text">Administrar equipos registrados.</p>
                    <a href="{{ route('equipos.index') }}" class="btn btn-light btn-sm">Ir a Equipos</a>
                </div>
            </div>
        </div>

        <!-- Servicios -->
        <div class="col-md-3 mt-3">
            <div class="card text-white bg-danger h-100">
                <div class="card-body">
                    <h5 class="card-title">Servicios</h5>
                    <p class="card-text">Administrar servicios y reparaciones.</p>
                    <a href="{{ route('servicios.index') }}" class="btn btn-light btn-sm">Ir a Servicios</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
