@extends('layouts.app')

@section('content')
    <div class="container-login">
        <div class="wrapper-login">
            <h1>
                FORMULARIO: CREAR UN TRABAJO
            </h1>

            <form action="/works" method="POST">
                @csrf

                <input type="number" placeholder="Id Clase trabajo" name="class_id">


                <input type="number" placeholder="Id Estudiante trabajo" name="user_id">

                <input type="text" placeholder="Nombre del trabajo" name="name">

                <input type="number" value="0.00" step="0.01" placeholder="Nota del trabajo" name="mark">

                <button class='btn' type="submit">Crear trabajo</button>


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
                    <a href="/works">Volver</a>
                </button>
            </div>

        </div>

    </div>
@endsection
