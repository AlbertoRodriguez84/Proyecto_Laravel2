<nav class="h-15vv bg-nav flex flex-row justify-start items-center space-x-2 p-3">
    <a href="{{ route('main') }}" class="btn btn-primary">Inicio</a>
    <a href="{{ route('proyectos.dwes') }}" class="btn btn-success">Proyectos</a>
    @auth
        <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Alumnos</a>
        <a href="{{ route('profesores.index') }}" class="btn btn-warning">Profesores</a>
    @endauth
</nav>
