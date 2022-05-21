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

                <label class="toggle" for="myToggle">
                    <input class="toggle__input" name="" type="checkbox" id="myToggle">
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
