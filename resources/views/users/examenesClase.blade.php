@extends('layouts.app')

@section('content')
    <div class="cabecera">
        <h1>Expediente - usuario: {{ Auth::user()->name }}</h1>

    </div>


    <div class="container-login">
        <div class="wrapper-login">

            <h3>Los examenes del alumno {{ $alumno->name }} en la clase {{ $clase->name }} son:</h3>

            <table>
                <thead>
                    <tr>
     			        <th>Nombre examen</th>
                        <th>Calificacion examen</th>
                      
                    </tr>
                </thead>


                <tbody>
                    @foreach ($examsEstudiante as $registro)
                        <tr>
                            <th>{{ $registro->name }}</th>

                            <td>{{ $registro->mark }}</td>

                        

                    @endforeach
                    </tr>
                </tbody>

            </table>

            <button class='btn'>
                <a href="/users/expediente">Volver al inicio del expediente</a>
            </button>

        


        </div>

@endsection