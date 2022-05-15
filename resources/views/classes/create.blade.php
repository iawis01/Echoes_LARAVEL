@extends('layouts.app')

@section('content')
    <div class="container-login">
        <div class="wrapper-login">
            <h1>
                FORMULARIO: CREAR UNA CLASE
            </h1>

            <form action="/classes" method="POST">
                @csrf

                <input type="number" placeholder="Id Profesor" name="user_id">


                <input type="number" placeholder="Id Course" name="course_id">


                <input type="number" placeholder="Id Schedule" name="schedule_id">


                <input type="text" placeholder="Nombre de la clase" name="name">

                <input type="text" placeholder="Color de la clase" name="color">


                <button class='btn' type="submit">Crear curso</button>


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
                    <a href="/classes">Volver</a>
                </button>
            </div>

        </div>

    </div>
@endsection