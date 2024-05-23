<x-layouts.layout>
    <h1 class="text-4xl text-red-700 text-center font-bold bg-gray-300">Listado de profesores</h1>
    @if (session()->has("status"))
        <div role="alert" class="alert alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>{{ session()->get("status") }}</span>
        </div>
    @endif
    <div class="flex justify-between">
        <form action="{{ route('profesores.index') }}" method="GET">
            <input type="text" name="search" placeholder="Buscar profesor..." class="mx-2">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>
    <div class="overflow-x-auto h-full">
        <table class="table table-xs table-pin-rows table-pin-cols">
            <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            @foreach($profesores as $profesor)
                <tr>
                    <td>{{ $profesor->DNI }}</td>
                    <td>{{ $profesor->nombre }}</td>
                    <td>{{ $profesor->edad }}</td>
                    <td>{{ $profesor->email }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{$profesores->links()}}
    </div>
</x-layouts.layout>


    // Ocultar el mensaje de sesión después de 5 segundos
    setTimeout(function () {
        var statusMessage = document.querySelector('.alert');
        if (statusMessage) {
            statusMessage.remove();
        }
    }, 5000);
</script>
