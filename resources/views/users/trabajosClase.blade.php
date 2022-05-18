@extends('layouts.app')

@section('content')
    <div class="cabecera">
        <h1>Expediente - usuario: {{ Auth::user()->name }}</h1>

    </div>


    <div class="container-login">
        <div class="wrapper-login">

            <h3>Clases del alumno {{ $alumno->name }} en el curso {{ $curso->name }}</h3>

            <table>
                <thead>
                    <tr>
                        <th>Id Clase</th>
                        <th>Id Schedule</th>
                        <th>Id Nombre</th>
                        <th>Id Color</th>
                    </tr>
                </thead>


                <tbody>
                    @foreach ($curso->clases as $registro)
                        <tr>
                            <th>{{ $registro->id_class }}</th>

                            <td>{{ $registro->schedule_id }}</td>
                            <td>{{ $registro->name }}</td>
                            <td>{{ $registro->color }}</td>
                    @endforeach
                    </tr>
                </tbody>

            </table>

            <div>
              <h3>Introduce el id de la clase para ver los trabajos</h3>
              <form action="examenesClase" method="POST">
                @csrf
                <input type="number" placeholder="Id de la clase" name="idClase">
        
                <button class='btn' type="submit">Busca trabajos</button>
              </form>
            </div>

            <div>
                <h3>Introduce el id de la clase para ver los examenes</h3>
                <form action="trabajosClase" method="POST">
                  @csrf
                  <input type="number" placeholder="Id de los examenes" name="idClase">
          
                  <button class='btn' type="submit">Busca examenes</button>
                </form>
              </div>

            <button class='btn'>
                <a href="/users/expediente">Volver</a>
            </button>

                

        </div>
    </div>
@endsection