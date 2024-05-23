<x-layouts.layout>
    <div class="overflow-x-auto h-full">
        <table class="table table-xs table-pin-rows table-pin-cols">
            <caption>Listado de alumnos</caption>
            <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            @foreach($alumnos as $alumno)
                <tr>
                    <td>{{$alumno->DNI}}</td>
                    <td>{{$alumno->nombre}}</td>
                    <td>{{$alumno->edad}}</td>
                    <td>{{$alumno->email}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.layout><?php
