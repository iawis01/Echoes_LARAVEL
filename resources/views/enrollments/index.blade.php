@extends('layouts.app')

@section('content')
    <div class="container-login">
        <div class="wrapper-login">

            <div id="text-center">
                <h1>
                    Matriculaciones
                </h1>
            </div>


            <div id="text-center">
                <button class='btn'>
                    <a href="enrollments/create">
                        Crear una nueva matriculación
                    </a>
                </button>
            </div>

            <div class="container-login">
                <div class="wrapper-login">

                    <table>
                        <thead>
                            <tr>
                                <th>Id Matriculacion</th>
                                <th>Id Curso</th>
                                <th>Id Estudiante</th>
                                <th>Editar</th>
                                <th>Eliminar</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($enrollments as $enrollment)
                                <tr>

                                    <th>{{ $enrollment->id }}</th>

                                    <td>
                                        {{ $enrollment->course_id }}
                                    </td>

                                    <td>
                                        {{ $enrollment->user_id }}
                                    </td>

                                    <td>
                                        <button class='btn'>
                                            <a href="enrollments/{{ $enrollment->id }}/edit">
                                                Edit
                                        </button>
                                    </td>


                                    <td>
                                        <form action="/enrollments/{{ $enrollment->id }}" method="POST">
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
