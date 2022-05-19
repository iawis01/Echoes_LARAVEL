@extends('layouts.app')

@section('content')
    <div class="container-login">
        <div class="wrapper-login">
            <h1>
                FORMULARIO: CREAR UNA NOTA FINAL DE UNA ASIGNATURA
            </h1>

            <form action="/exams/createFinalNote" method="POST">
                @csrf

                <input type="number" placeholder="Id Clase examen" name="class_id">


                <input type="number" placeholder="Id Estudiante examen" name="user_id">

                <button class='btn' type="submit">Crear nota final</button>


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
                    <a href="/exams">Volver</a>
                </button>
            </div>

        </div>

    </div>
@endsection
