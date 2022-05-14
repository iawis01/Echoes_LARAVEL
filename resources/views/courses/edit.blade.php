@extends('layouts.app')

@section('content')
    <div class="container-login">
        <div class="wrapper-login">
            <h1>
                FORMULARIO: EDITAR UN CURSO
            </h1>

            <form action="/courses/{{ $course->id_course }}" method="POST">
                @csrf
                @method('PUT')

                <input type="text" placeholder="Nombre" name="name" value="{{ $course->name }}">


                <input type="text" placeholder="Descripcion" name="description" value="{{ $course->description }}">


                <input type="date" placeholder="Fecha de inicio de curso" name="date_start"
                    value="{{ $course->date_start }}">


                <input type="date" placeholder="Fecha de fin de curso" name="date_end" value="{{ $course->date_end }}">

                <label for="number">Selecciona si está activo o no.</label>
                <select id="active" name="active">
                    <option value=0>No activo</option>
                    <option value=1>Activo</option>
                </select>
                <br>
                <br>

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
                    <a href="/courses">Volver</a>
                </button>
            </div>

        </div>

    </div>
@endsection
