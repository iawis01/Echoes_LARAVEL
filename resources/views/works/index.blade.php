@extends('layouts.app')

@section('content')
    <div class="container-login">
        <div class="wrapper-login">

            <div id="text-center">
                <h1>
                    Trabajos
                </h1>
            </div>


            <div id="text-center">
                <button class='btn'>
                    <a href="works/create">
                        Añade un trabajo
                    </a>
                </button>
            </div>

            <div class="container-login">
                <div class="wrapper-login">

                    <table>
                        <thead>
                            <tr>
                                <th>Id Trabajo</th>
                                <th>Id Clase</th>
                                <th>Id Estudiante</th>
                                <th>Nombre</th>
                                <th>Nota</th>
                                <th>Editar</th>
                                <th>Eliminar</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($works as $work)
                                <tr>

                                    <th>{{ $work->id }}</th>

                                    <td>
                                        {{ $work->class_id }}
                                    </td>

                                    <td>
                                        {{ $work->user_id }}
                                    </td>

                                    <td>
                                        {{ $work->name }}
                                    </td>

                                    <td>
                                        {{ $work->mark }}
                                    </td>

                                    <td>
                                        <button class='btn'>
                                            <a href="works/{{ $work->id }}/edit">
                                                Edit
                                        </button>
                                    </td>


                                    <td>
                                        <form action="/works/{{ $work->id }}" method="POST">
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
