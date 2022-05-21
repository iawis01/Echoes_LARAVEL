@extends('layouts.app')

@section('content')
    <div class="cabecera">
        <h1>Perfil - usuario:</h1>
        <div>
            <h1>{{ Auth::user()->name }}</h1>
        </div>
    </div>

    <div class="container-profile">
        <div class="card" style=" width: 18rem; ">
            <div class="card-body">
                <p class="card-text">Notificarme de cambios en mis notas</p>

                <label class="toggle" for="workToggle">
                    <input class="toggle__input" name="" type="checkbox" id="workToggle" {{ $notifications->work == 1 ? "checked" : ""}}>
                    <p>Trabajo</p>
                    <div class="toggle__fill"></div>
                </label>
                <label class="toggle" for="examToggle">
                    <input class="toggle__input" name="" type="checkbox" id="examToggle" {{ $notifications->exam == 1 ? "checked" : ""}}>
                    <p>Examen</p>
                    <div class="toggle__fill"></div>
                </label>
                <label class="toggle" for="continuosAssesmentToggle">
                    <input class="toggle__input" name="" type="checkbox" id="continuosAssesmentToggle" {{ $notifications->continuos_assesment == 1 ? "checked" : ""}}>
                    <p>Evaluacion Continua</p>
                    <div class="toggle__fill"></div>
                </label>
                <label class="toggle" for="finalNoteToggle">
                    <input class="toggle__input" name="" type="checkbox" id="finalNoteToggle" {{ $notifications->final_note == 1 ? "checked" : ""}}>
                    <p>Nota final</p>
                    <div class="toggle__fill"></div>
                </label>
            </div>
        </div>

        <div class="wrapper-profile"
            style="margin: auto; display: grid; grid-template-columns: auto auto auto; align-items: start; justify-content: safe center;">

            <div class="card" style=" width: 18rem; ">
                <div class="card-body">
                    <h4 class="card-title">Username</h4>
                    <p class="card-text">Cambia tu nombre de usuario</p>
                    <button class='btn'>
                        <a href="/users/change-username">Editar</a>
                    </button>
                </div>
            </div>

            <div class="card" style=" width: 18rem; ">
                <div class="card-body">
                    <h4 class="card-title">Email</h4>
                    <p class="card-text">Cambia tu email</p>
                    <button class='btn'>
                        <a href="/users/change-email">Editar</a>
                    </button>
                </div>
            </div>

            <div class="card" style=" width: 18rem; ">
                <div class="card-body">
                    <h4 class="card-title">Contraseña</h4>
                    <p class="card-text">Cambia tu contraseña</p>
                    <button class='btn'>
                        <a href="/users/change-password">Editar</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
