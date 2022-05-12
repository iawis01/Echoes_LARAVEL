@extends('layouts.app')

@section('content')

<div class="container-login">
    <div class="wrapper-login">

        <div id="text-center">
            <h1>
                Cursos
            </h1>
        </div>


        <div id="text-center">
            <button class='btn'>
                <a href="courses/create">
                    Crear un nuevo curso
                </a>
            </button>
        </div>

        <div class="container-login">
          <div class="wrapper-login">

            <table>
                <thead>
                    <tr>
                        <th>Id_Course</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Date_start</th>
                        <th>Date_end</th>
                        <th>Active</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($courses as $course)
                        <tr>

                            <th>{{ $course->id_course }}</th>

                            <td>
                                {{ $course->name }}
                            </td>

                            <td>
                                {{ $course->description }}
                            </td>

                            <td>
                                {{ $course->date_start }}
                            </td>

                            <td>
                                {{ $course->date_end }}
                            </td>

                            <td>
                                {{ $course->active }}
                            </td>

                            <td>
                                <button class='btn'>
                                    <a href="courses/{{ $course->id_course }}/edit">
                                        Edit
                                </button>
                            </td>


                            <td>
                                <form action="/courses/{{ $course->id_course }}" method="POST">
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
                <a href="/">Volver</a>
            </button>

          </div>
        </div>

    </div>
</div>


@endsection
