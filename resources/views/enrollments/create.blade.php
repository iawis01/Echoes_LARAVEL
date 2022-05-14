@extends('layouts.app')

@section('content')
    <div class="container-login">
        <div class="wrapper-login">
            <h1>
                FORMULARIO: CREAR UNA MATRICULACION
            </h1>

            <form action="/enrollments" method="POST">
                @csrf

                <input type="number" placeholder="Id Curso matriculacion" name="course_id">


                <input type="number" placeholder="Id Estudiante matriculacion" name="user_id">

                <button class='btn' type="submit">Crear matriculacion</button>


            </form>



            @if ($errors->any())
                <div class="error-red">
                    @foreach ($errors->all() as $error)
                        <ul>
                            <li class="red">
                                {{ $error }}
                            </li>
                            <ul>
                    @endforeach
                </div>
            @endif

            <div>
                <button class='btn'>
                    <a href="/enrollments">Volver</a>
                </button>
            </div>

        </div>

    </div>
@endsection
