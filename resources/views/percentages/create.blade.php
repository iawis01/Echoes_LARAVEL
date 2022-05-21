@extends('layouts.app')

@section('content')
    <div class="container-login">
        <div class="wrapper-login">
            <h1>
                FORMULARIO: CREAR UN PORCENTAJE
            </h1>

            <form action="/percentages" method="POST">
                @csrf

                <input type="number" placeholder="Id Curso porcentaje" name="course_id">


                <input type="number" placeholder="Id Clase porcentaje" name="class_id">

                <input type="number" step="0.01" placeholder="Porcentaje evaluación continua" name="continuous_assessment">

                <input type="number" step="0.01" placeholder="Porcentaje examenes" name="exams">

                <button class='btn' type="submit">Crear porcentaje</button>


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
                    <a href="/percentages">Volver</a>
                </button>
            </div>

        </div>

    </div>
@endsection
