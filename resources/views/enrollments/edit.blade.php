@extends('layouts.app')

@section('content')
    <div class="container-login">
        <div class="wrapper-login">
            <h1>
                FORMULARIO: EDITAR UNA MATRICULACION
            </h1>

            <form action="/enrollments/{{ $enrollment->id }}" method="POST">
                @csrf
                @method('PUT')

                <input type="number" placeholder="Id Curso " name="course_id" value="{{ $enrollment->course_id }}">


                <input type="number" placeholder="Id Estudiante " name="user_id" value="{{ $enrollment->user_id }}">


                

                <button class='btn' type="submit">Editar curso</button>


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
