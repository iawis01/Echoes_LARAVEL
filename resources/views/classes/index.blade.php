@extends('layouts.app')

@section('content')
    <div class="container-login">
        <div class="wrapper-login">

            <div id="text-center">
                <h1>
                    Clases
                </h1>
            </div>


            <div id="text-center">
                <button class='btn'>
                    <a href="classes/create">
                        Crear una nueva clase
                    </a>
                </button>
            </div>

            <div class="container-login">
                <div class="wrapper-login">

                    <table>
                        <thead>
                            <tr>
                                <th>Id Clase</th>
                                <th>Id Profesor</th>
                                <th>Id curso</th>
                                <th>Id horario</th>
                                <th>Nombre de clase</th>
                                <th>Color de clase</th>
                                <th>Editar</th>
                                <th>Eliminar</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($clases as $clase)
                                <tr>

                                    <th>{{ $clase->id_class }}</th>

                                    <td>
                                        {{ $clase->user_id }}
                                    </td>

                                    <td>
                                        {{ $clase->course_id }}
                                    </td>
                                    <td>
                                      {{ $clase->schedule_id }}
                                  </td>
                                  <td>
                                    {{ $clase->name }}
                                </td>
                                <td>
                                  {{ $clase->color }}
                              </td>

                                    <td>
                                        <button class='btn'>
                                            <a href="classes/{{ $clase->id_class }}/edit">
                                                Edit
                                        </button>
                                    </td>


                                    <td>
                                        <form action="/classes/{{ $clase->id_class }}" method="POST">
                                            @csrf
                                            @method('delete')

                                            <button class='btn' type='submit'>
                                                Eliminar
                                            </button>

                                        </form>
                                    </td>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>

                    <button class='btn'>
                        <a href="/admins">Volver</a>
                    </button>

                </div>
            </div>

        </div>
    </div>
@endsection
