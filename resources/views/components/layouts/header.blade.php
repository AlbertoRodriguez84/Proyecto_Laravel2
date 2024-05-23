<header class="h-15v bg-header p-5 flex justify-between items-center">
    <img class="max-h-full" src="{{ asset('images/Logo.png') }}" alt="Logo">
    <h1 class="text-5xl text-white">CRUD de alumnos</h1>
    <div>
        @guest
            <a href="/login" class="btn btn-primary">Acceso</a>
            <a href="/register" class="btn btn-secondary">Registro</a>
        @endguest
        @auth
            <h1 class="text-2xl text-white mr-4">{{ auth()->user()->name }}</h1>
            <form action="{{ route("logout") }}" method="POST">
                @csrf
                <input class="btn btn-glass" type="submit" value="Salir">
            </form>
        @endauth
    </div>
</header>
