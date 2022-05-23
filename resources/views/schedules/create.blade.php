@extends('layouts.app')

@section('content')
    <div class="container-login">
        <div class="wrapper-login">
            <h1>
                FORMULARIO: CREAR UN HORARIO
            </h1>

            <form action="/schedules" method="POST">
                @csrf

                <input type="number" placeholder="Id Clase" name="class_id">


                <input type="time" placeholder="Hora inicio" name="time_start">


                <input type="time" placeholder="Hora fin" name="time_end">


                <input type="date" placeholder="Dia" name="day">

               

                <button class='btn' type="submit">Crear horario</button>


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
                    <a href="/schedules">Volver</a>
                </button>
            </div>

        </div>

    </div>
@endsection