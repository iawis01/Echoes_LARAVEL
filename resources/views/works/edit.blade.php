@extends('layouts.app')

@section('content')
    <div class="container-login">
        <div class="wrapper-login">
            <h1>
                FORMULARIO: EDITAR UN TRABAJO
            </h1>

            <form action="/works/{{ $work->id }}" method="POST">
                @csrf
                @method('PUT')

                <input type="number" placeholder="Id Clase trabajo " name="class_id" value="{{ $work->class_id }}">

                <input type="number" placeholder="Id Estudiante trabajo " name="user_id" value="{{ $work->user_id }}">

                <input type="text" placeholder="Nombre del trabajo" name="name" value="{{ $work->name }}">

                <input type="number" placeholder="Nota del trabajo" name="mark" value="{{ $work->mark }}">
                

                <button class='btn' type="submit">Editar trabajo</button>


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
