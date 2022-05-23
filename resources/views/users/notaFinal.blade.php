@extends('layouts.app')

@section('content')
    <div class="cabecera">
        <h1>Expediente - usuario: {{ Auth::user()->name }}</h1>

    </div>


    <div class="container-login">
        <div class="wrapper-login">

            <h3>Nota final del alumno {{ $alumno->name }} en la clase {{ $clase->name }}</h3>

            <table>
                <thead>
                    <tr>
                      <th>Id Curso</th>
                        <th>Nombre Curso</th>
                        <th>Id Clase</th>
                        <th>Nombre Clase</th>
                        <th>Nota final</th>
                    </tr>
                </thead>


                <tbody>
                    
                        <tr>
                            <td>{{ $curso->id }}</td>
                            <td>{{ $curso->name }}</td>
                            <td>{{ $clase->id }}</td>
                            <td>{{ $clase->name }}</td>
                            <td>{{ $notaFinal }}</td>

                    </tr>
                </tbody>

            </table>


            <button class='btn'>
                <a href="/users/expediente">Volver</a>
            </button>

                

        </div>
    </div>
@endsection