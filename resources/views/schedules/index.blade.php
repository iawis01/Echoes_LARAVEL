@extends('layouts.app')

@section('content')
    <div class="container-login">
        <div class="wrapper-login">

            <div id="text-center">
                <h1>
                    Horarios
                </h1>
            </div>


            <div id="text-center">
                <button class='btn'>
                    <a href="schedules/create">
                        Crear un nuevo horario
                    </a>
                </button>
            </div>

            <div class="container-login">
                <div class="wrapper-login">

                    <table>
                        <thead>
                            <tr>
                                <th>Id Horario</th>
                                <th>Id Clase</th>
                                <th>Hora de inicio</th>
                                <th>Hora de fin</th>
                                <th>Día</th>
                                <th>Editar</th>
                                <th>Eliminar</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($schedules as $schedule)
                                <tr>

                                    <th>{{ $schedule->id }}</th>

                                    <td>
                                        {{ $schedule->class_id }}
                                    </td>

                                    <td>
                                        {{ $schedule->time_start }}
                                    </td>
                                    <td>
                                      {{ $schedule->time_end }}
                                  </td>
                                  <td>
                                    {{ $schedule->day }}
                                </td>

                                    <td>
                                        <button class='btn'>
                                            <a href="schedules/{{ $schedule->id }}/edit">
                                                Edit
                                        </button>
                                    </td>


                                    <td>
                                        <form action="/schedules/{{ $schedule->id }}" method="POST">
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
