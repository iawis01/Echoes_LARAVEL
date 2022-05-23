@extends('layouts.app')

@section('content')
    <div class="container-login">
        <div class="wrapper-login">
            <h1>
                FORMULARIO: EDITAR UN HORARIO
            </h1>

            <form action="/schedules/{{ $schedule->id }}" method="POST">
                @csrf
                @method('PUT')

                <input type="number" placeholder="Id Clase" name="class_id" value="{{ $schedule->class_id }}">


                <input type="time" placeholder="Hora de inicio" name="time_start" value="{{ $schedule->time_start }}">

                <input type="time" placeholder="Hora de fin" name="time_end" value="{{ $schedule->time_end }}">

                <input type="date" placeholder="Dia" name="day" value="{{ $schedule->day }}">
                

                <button class='btn' type="submit">Editar horario</button>


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
