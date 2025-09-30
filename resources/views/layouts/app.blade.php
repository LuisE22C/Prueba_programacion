<!DOCTYPE html>
<html>
<head>
    <title>Sistema Taller Servicios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Taller Servicios</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('clientes.index') }}">Clientes</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('tecnicos.index') }}">Técnicos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('marcas.index') }}">Marcas</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('equipos.index') }}">Equipos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('servicios.index') }}">Servicios</a></li>
            </ul>
        </div>
    </div>
</nav>

    @yield('content')
    
</body>
</html>
