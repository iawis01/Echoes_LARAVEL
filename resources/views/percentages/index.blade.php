@extends('layouts.app')

@section('content')
    <div class="container-login">
        <div class="wrapper-login">

            <div id="text-center">
                <h1>
                    Porcentajes
                </h1>
            </div>


            <div id="text-center">
                <button class='btn'>
                    <a href="percentages/create">
                        Añade un porcentaje
                    </a>
                </button>
            </div>

            <div class="container-login">
                <div class="wrapper-login">

                    <table>
                        <thead>
                            <tr>
                                <th>Id Porcentaje</th>
                                <th>Id Curso</th>
                                <th>Id Clase</th>
                                <th>Porcentaje evaluación continua</th>
                                <th>Porcentaje examenes</th>
                                
                                <th>Editar</th>
                                <th>Eliminar</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($percentages as $percentage)
                                <tr>

                                    <th>{{ $percentage->id }}</th>

                                    <td>
                                        {{ $percentage->course_id }}
                                    </td>

                                    <td>
                                        {{ $percentage->class_id }}
                                    </td>

                                    <td>
                                        {{ $percentage->continuous_assessment }}
                                    </td>

                                    <td>
                                        {{ $percentage->exams }}
                                    </td>

                                    <td>
                                        <button class='btn'>
                                            <a href="percentages/{{ $percentage->id }}/edit">
                                                Edit
                                        </button>
                                    </td>


                                    <td>
                                        <form action="/percentages/{{ $percentage->id }}" method="POST">
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
