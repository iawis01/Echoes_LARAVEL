@extends('layouts.app')

@section('content')

<div class="container-login">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Preferencias de notificaciones') }}</div>

                    <form action="{{ route('update-notifications') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="mb-3">
                                <label class="toggle" for="workToggle">
                                    <input class="toggle__input" name="options[]" type="checkbox" id="workToggle"  {{ $notifications->work == 1 ? "checked" : ""}}>
                                    <p>Trabajo</p>
                                    <div class="toggle__fill"></div>
                                </label>
                                <label class="toggle" for="examToggle">
                                    <input class="toggle__input" name="options[]" type="checkbox" id="examToggle" {{ $notifications->exam == 1 ? "checked" : ""}}>
                                    <p>Examen</p>
                                    <div class="toggle__fill"></div>
                                </label>
                                <label class="toggle" for="continuosAssessmentToggle">
                                    <input class="toggle__input" name="options[]" type="checkbox" id="continuosAssessmentToggle" {{ $notifications->continuos_assessment == 1 ? "checked" : ""}}>
                                    <p>Evaluacion Continua</p>
                                    <div class="toggle__fill"></div>
                                </label>
                                <label class="toggle" for="finalNoteToggle">
                                    <input class="toggle__input" name="options[]" type="checkbox" id="finalNoteToggle" {{ $notifications->final_note == 1 ? "checked" : ""}}>
                                    <p>Nota final</p>
                                    <div class="toggle__fill"></div>
                                </label>
                            </div>

                        </div>

                        <div class="card-footer">
                            <button class="btn btn-success" type="submit" id="submit">Submit</button>
                        </div>

                    </form>
                </div>


                <div class="container-login">
                    <div class="wrapper-login">

                        <button class='btn'>
                            <a href="/users/index">Volver</a>
                        </button>
                    </div>
                </div>


            </div>
        </div>

    </div>
</div>

<script src="http://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous">
</script>
<script>
   jQuery(document).ready(function(){
       let work;
       let exam;
       let continuousAssessment;
       let finalNote;
      jQuery('#submit').click(function(e){
          e.preventDefault();
          $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
                });

          if($(workToggle).is(":checked")){
            work = 1;
          } else {
            work = 0;
          }

          if($(examToggle).is(":checked")){
            exam = 1;
          } else {
            exam = 0;
          }
          
          if($(continuosAssessmentToggle).is(":checked")){
            continuousAssessment = 1;
          } else {
            continuousAssessment = 0;
          }
          
          if($(finalNoteToggle).is(":checked")){
            finalNote = 1;
          } else {
            finalNote = 0;
          }

         jQuery.ajax({
            type: 'POST',
            dataType: 'json',
            url: "{{ route('notifications') }}",
            data: {
               work: work,
               exam: exam,
               continuos_assessment: continuousAssessment,
               final_note: finalNote
            },
            success: function(result){
               console.log(result);
            }});
         });

        });

</script>
@endsection