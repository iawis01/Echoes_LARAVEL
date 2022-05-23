@extends('layouts.app')

@section('content')
    <div class="container-login">
        <div class="wrapper-login">
            <h1>
                FORMULARIO: EDITAR UNA CLASE
            </h1>

            <form action="/classes/{{ $clase->id }}" method="POST">
                @csrf
                @method('PUT')

                <input type="number" placeholder="Id Profesor" name="user_id" value="{{ $clase->user_id }}">


                <input type="number" placeholder="Id Curso" name="course_id" value="{{ $clase->course_id }}">

                <input type="number" placeholder="Id Horario" name="schedule_id" value="{{ $clase->schedule_id }}">

                <input type="text" placeholder="Nombre" name="name" value="{{ $clase->name }}">

                <input type="text" placeholder="Color" name="color" value="{{ $clase->color }}">
                

                <button class='btn' type="submit">Editar clase</button>


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
