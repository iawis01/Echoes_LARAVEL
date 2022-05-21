@extends('layouts.app')

@section('content')
    <div class="container-login">
        <div class="wrapper-login">

            <div id="text-center">
                <h1>
                    Examenes
                </h1>
            </div>


            <div id="text-center">
                <button class='btn'>
                    <a href="exams/create">
                        Añade un examen
                    </a>
                </button>
                <button class='btn'>
                    <a href="exams/createFinalNote">
                        Agrega la nota final
                    </a>
                </button>
                <button class='btn'>
                    <a href="exams/editFinalNote">
                        edita una nota final
                    </a>
                </button>
            </div>

            <div class="container-login">
                <div class="wrapper-login">

                    <table>
                        <thead>
                            <tr>
                                <th>Id Examen</th>
                                <th>Id Clase</th>
                                <th>Id Estudiante</th>
                                <th>Nombre</th>
                                <th>Nota</th>
                                <th>Día y hora de creacion</th>
                                <th>Día y hora de actualización</th>
                                <th>Editar</th>
                                <th>Eliminar</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($exams as $exam)
                                <tr>

                                    <th>{{ $exam->id }}</th>

                                    <td>
                                        {{ $exam->class_id }}
                                    </td>

                                    <td>
                                        {{ $exam->user_id }}
                                    </td>

                                    <td>
                                        {{ $exam->name }}
                                    </td>

                                    <td>
                                        {{ $exam->mark }}
                                    </td>

                                    <td>
                                        {{ $exam->created_at }}
                                    </td>

                                    <td>
                                        {{ $exam->updated_at }}
                                    </td>

                                    <td>
                                        <button class='btn'>
                                            <a href="exams/{{ $exam->id }}/edit">
                                                Edit
                                        </button>
                                    </td>


                                    <td>
                                        <form action="/exams/{{ $exam->id }}" method="POST">
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