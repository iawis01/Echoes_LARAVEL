@extends('layouts.app')

@section('content')
    <div class="cabecera">
        <h1>Expediente - usuario: {{ Auth::user()->name }}</h1>

    </div>


    <div class="container-login">
        <div class="wrapper-login">

            <h3>Horarios del {{ $alumno->name }} en todas las clases de todos sus cursos</h3>

            <table>
              <thead>
                  <tr>
                      <th>Id Curso</th>
                      <th>Id Clase</th>
                      <th>Nombre clase</th>
                      <th>Color clase</th>
                      <th>Día</th>
                      <th>Hora de inicio</th>
                      <th>Hora de fin</th>
                  </tr>
              </thead>


              <tbody>
                  @foreach ($cursosEstudiante as $cursoEstudiante)

                      @foreach($cursoEstudiante->clases as $claseEstudiante)

                         @if ($claseEstudiante->schedule->day >= $hoy)
                          @if($claseEstudiante->schedule->day <= $semana)

                      <tr>
                          <th>{{ $claseEstudiante->course_id }}</th>
                          <th>{{ $claseEstudiante->id }}</th>
                          <td>{{ $claseEstudiante->name }}</td>
                          <td>{{ $claseEstudiante->color }}</td>
                          <td>{{ $claseEstudiante->schedule->day }}</td>
                          <td>{{ $claseEstudiante->schedule->time_start}}</td>
                          <td>{{ $claseEstudiante->schedule->time_end}}</td>
                          
                            @endif
                          @endif
                            
                          @endforeach
                      
                  @endforeach
                  </tr>
              </tbody>

      

          </table>

          
          <form action="users/horariosClases" method="POST">
            @csrf
            <button class='btn'><a href="/users/horariosClasesHoy">Horarios de hoy</a></button>
            <button class='btn'><a href="/users/horariosClasesSemana">Horarios de esta semana</a></button>
            <button class='btn'><a href="/users/horariosClasesMes">Horarios de este mes</a></button>
          </form>

            <button class='btn'>
                <a href="/users/horariosClases">Volver</a>
            </button>

                

        </div>
    </div>
@endsection