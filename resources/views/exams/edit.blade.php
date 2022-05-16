@extends('layouts.app')

@section('content')
    <div class="container-login">
        <div class="wrapper-login">
            <h1>
                FORMULARIO: EDITAR UN EXAMEN
            </h1>

            <form action="/exams/{{ $exam->id }}" method="POST">
                @csrf
                @method('PUT')

                <input type="number" placeholder="Id Clase examen " name="class_id" value="{{ $exam->class_id }}">

                <input type="number" placeholder="Id Estudiante examen " name="user_id" value="{{ $exam->user_id }}">

                <input type="text" placeholder="Nombre del examen" name="name" value="{{ $exam->name }}">

                <input type="number"  step="0.01" placeholder="Nota del examen" name="mark" value="{{ $exam->mark }}">
                

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
                    <a href="/exams">Volver</a>
                </button>
            </div>

        </div>

    </div>
@endsection