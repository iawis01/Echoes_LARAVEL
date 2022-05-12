@extends('layouts.app')

@section('content')
<div class="container-login">
  <div class="wrapper-login">
          <h1>
              FORMULARIO: CREAR UN CURSO
          </h1>

      <form action="/courses" method="POST">
          @csrf

          <input type="text" placeholder="Nombre" name="name">


          <input type="text" placeholder="Descripcion" name="description">


          <input type="date" placeholder="Fecha de inicio de curso" name="date_start">


          <input type="date" placeholder="Fecha de fin de curso" name="date_end">

         <label for="number">Selecciona si está activo o no.</label>
               <select id="active" name="active">
               <option value=0>No activo</option>
               <option value=1>Activo</option>
               </select>
          <br>
          <br>

          <button class='btn' type="submit">Crear curso</button>


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
