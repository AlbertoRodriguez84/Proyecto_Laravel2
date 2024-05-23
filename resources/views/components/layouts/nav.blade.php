<nav class="h-15vv bg-nav flex flex-row justify-start items-center space-x-2 p-3">
    <a class="btn btn-primary" href="">Inicio</a>
    <a class="btn btn-success" href="">Proyectos</a>
    @auth
        <a href="{{route("alumnos.index")}}" class=" btn btn-secondary" href="">Alumnos</a>
    @endauth
</nav>
