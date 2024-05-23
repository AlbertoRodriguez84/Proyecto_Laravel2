<x-layouts.layout>
    <h1 class="text-4xl text-red-600 font-bold flex flex-row justify-center">Alta nuevos profesores</h1>
    <div class="flex flex-row justify-center p-5 bg-gray-200 ">

        <form method="POST" action="{{ route('profesores.store') }}" method="POST" class="bg-white p-7 rounded-3xl">
            @csrf
            <x-input-label for="nombre">
                Nombre
            </x-input-label>
            <x-text-input name="nombre" value="{{ old('nombre') }}" />
            @if($errors->get("nombre"))
                @foreach($errors->get("nombre") as $error)
                    <div class="text-sm text-red-600">
                        {{ $error }}
                    </div>
                @endforeach
            @endif

            <x-input-label for="DNI">
                DNI
            </x-input-label>
            <x-text-input name="DNI" value="{{ old('DNI') }}" />
            @if($errors->get("DNI"))
                @foreach($errors->get("DNI") as $error)
                    <div class="text-sm text-red-600">
                        {{ $error }}
                    </div>
                @endforeach
            @endif

            <x-input-label for="email">
                Email
            </x-input-label>
            <x-text-input name="email" value="{{ old('email') }}" />
            @if($errors->get("email"))
                @foreach($errors->get("email") as $error)
                    <div class="text-sm text-red-600">
                        {{ $error }}
                    </div>
                @endforeach
            @endif

            <x-input-label for="edad">
                Edad
            </x-input-label>
            <x-text-input name="edad" value="{{ old('edad') }}" />
            @if($errors->get("edad"))
                @foreach($errors->get("edad") as $error)
                    <div class="text-sm text-red-600">
                        {{ $error }}
                    </div>
                @endforeach
            @endif

            <br/>
            <button class="btn btn-primary mx-2 mt-10 p-100 " type="submit" value="Guardar">Guardar</button>
            <a href="{{ route('profesores.index') }}" class="btn btn-primary mx-2 mt-10">Cancelar</a>

        </form>
    </div>
</x-layouts.layout>
