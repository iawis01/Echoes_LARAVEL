@extends('layouts.app')

@section('content')
    <div class="cabecera">
        <h1>Expediente - usuario: {{ Auth::user()->name }}</h1>

    </div>


    <div class="container-login">
        <div class="wrapper-login">

            <h3>El alumno <span>{{ $alumno->name }} está matriculado en los cursos:</span></h3>

            <table>
                <thead>
                    <tr>
                        <th>Id Curso</th>
                        <th>Nombre Curso</th>

                    </tr>
                </thead>


                <tbody>
                    @foreach ($alumno->courses as $registro)
                        <tr>
                            <th>{{ $registro->id }}</th>

                            <td>{{ $registro->name }}</td>
                    @endforeach
                    </tr>
                </tbody>

            </table>

            <div>
            <button class='btn'>
                <a href="/users/horariosClases">Ver los horarios de las clases</a>
            </button>
        </div>

            <div>
              <h3>Introduce el id de tu curso para ver sus clases</h3>
              <form action="clasesCurso" method="POST">
                @csrf
                <input type="number" placeholder="Id del curso" name="idCurso">
        
                <button class='btn' type="submit">Busca clases</button>
              </form>
            </div>


                

        </div>
    </div>
@endsection
