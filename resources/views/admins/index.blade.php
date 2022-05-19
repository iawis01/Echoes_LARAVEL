@extends('layouts.app')

@section('content')
    <div class="container-login">
        <div class="wrapper-login">
            <div id="text-center">
                <h1>
                    Estudiantes
                </h1>
            </div>


            <div class="container-login">
                <div class="wrapper-login">

                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                                <tr>

                                    <th>{{ $user->id }}</th>

                                    <td>
                                        {{ $user->name }}
                                    </td>

                                    <td>
                                        {{ $user->email }}
                                    </td>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>

                    <button class='btn'>
                        <a href="/">Volver</a>
                    </button>

                </div>
            </div>




        </div>
    </div>



    <div class="container-login">
        <div class="wrapper-login">
            <div class="box"
                style="margin: auto; display: grid; grid-template-columns: auto auto auto auto auto auto auto; align-items: start; justify-content: space-between;">

                <div class="card-admin">
                    <div class="card-body">
                        <h5 class="card-title">Cursos</h5>
                        <p class="card-text">Gestiona los cursos</p>

                        <div id="text-center">
                            <button class='btn'>
                                <a href="courses">Entrar
                                </a>
                            </button>
                        </div>

                    </div>
                </div>

                <div class="card-admin">
                    <div class="card-body">
                        <h5 class="card-title">Matriculaciones</h5>
                        <p class="card-text">Gestiona las matriculaciones</p>

                        <button class='btn'>
                            <a href="enrollments">Entrar</a>
                        </button>

                    </div>
                </div>

                <div class="card-admin">
                    <div class="card-body">
                        <h5 class="card-title">Clases</h5>
                        <p class="card-text">Gestiona las clases</p>

                        <button class='btn'>
                            <a href="classes">Entrar</a>
                        </button>

                    </div>
                </div>

                <div class="card-admin">
                    <div class="card-body">
                        <h5 class="card-title">Horarios</h5>
                        <p class="card-text">Gestiona los horarios</p>

                        <button class='btn'>
                            <a href="schedules">Entrar</a>
                        </button>

                    </div>
                </div>

                <!--<div class="card-admin">
                    <div class="card-body">
                        <h5 class="card-title">Profesores</h5>
                        <p class="card-text">Gestiona los profesores</p>

                        <button class='btn'>
                            <a href="teachers">Entrar</a>
                        </button>

                    </div>
                </div>-->


            </div>

            <div class="container-login">
                <div class="wrapper-login">
                    <div class="box"
                        style="margin: auto; display: grid; grid-template-columns: auto auto auto auto auto auto auto; align-items: start; justify-content: safe center;">
                        <div class="card-admin">
                            <div class="card-body">
                                <h5 class="card-title">Trabajos</h5>
                                <p class="card-text">Gestiona los trabajos</p>
        
                                <button class='btn'>
                                    <a href="works">Entrar</a>
                                </button>
        
                            </div>
                        </div>

                        <div class="card-admin">
                            <div class="card-body">
                                <h5 class="card-title">Examenes</h5>
                                <p class="card-text">Gestiona los examenes</p>
        
                                <button class='btn'>
                                    <a href="exams">Entrar</a>
                                </button>
        
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
