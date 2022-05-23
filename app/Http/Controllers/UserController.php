<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Clase;
use App\Models\Work;
use App\Models\Notifications;
use App\Mail\NotificationMail;
use App\Models\Exam;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        // conseguir las preferencias de notificacion del usuario
        $notifications = Notifications::where('student_id', $id)->first();
        return view('users.index', compact('notifications'));
    }
    public function changePassword()
    {
        return view('users/change-password');
    }

    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        #Match The Old Password
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }

        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with("status", "Password changed successfully!");
    }

    public function changeUsername()
    {
        return view('users/change-username');
    }

    public function updateUsername(Request $request)
    {
        # Validation
        $request->validate([
            'old_username' => 'required',
            'new_username' => 'required|confirmed',
        ]);

        #Match The Old username
        if (!$request->old_username == auth()->user()->username) {
            return back()->with("error", "Old Username Doesn't match!");
        }

        #Update the new username
        User::whereId(auth()->user()->id)->update([
            'username' => $request->new_username,
        ]);

        return back()->with("status", "Username changed successfully!");
    }

    public function changeEmail()
    {
        return view('users/change-email');
    }

    public function updateEmail(Request $request)
    {
        # Validation
        $request->validate([
            'old_email' => 'required',
            'new_email' => 'required|confirmed',
        ]);

        #Match The Old email
        if (!$request->old_email == auth()->user()->email) {
            return back()->with("error", "Old Email Doesn't match!");
        }

        #Update the new username
        User::whereId(auth()->user()->id)->update([
            'email' => $request->new_email,
        ]);

        return back()->with("status", "Email changed successfully!");
    }


    public function expediente()
    {
        $idAlumno =  auth()->user()->id;

        $alumno = User::find($idAlumno); 


        if (Gate::allows('user-only', auth()->user())) {
            return view('users/expediente', compact('alumno'));
        } else {
            return view('welcome');
        }

       
    }

    public function clasesCursoAlumno(){
        $idAlumno =  auth()->user()->id;

        $alumno = User::find($idAlumno); 
        
        

        $idCursoClases = $_REQUEST['idCurso'];

        $curso = Course::find($idCursoClases);

        return view('users/clasesCurso', compact('alumno', 'idCursoClases', 'curso'));
    }

    public function trabajosClaseCurso(){
        $idAlumno =  auth()->user()->id;

        $alumno = User::find($idAlumno); 
        
        


        $idClaseTrabajos = $_REQUEST['idClase'];

        $clase = Clase::find($idClaseTrabajos);

        $worksEstudiante = Work::where('class_id', '=', $idClaseTrabajos)
                                ->where('user_id', '=', $idAlumno)->get();

        return view('users/trabajosClase', compact('alumno', 'idClaseTrabajos', 'clase', 'worksEstudiante'));
    }

    public function examenesClaseCurso(){
        $idAlumno =  auth()->user()->id;

        $alumno = User::find($idAlumno); 
        
        

        $idClaseTrabajos = $_REQUEST['idClase'];

        $clase = Clase::find($idClaseTrabajos);

        $examsEstudiante = Exam::where('class_id', '=', $idClaseTrabajos)
                                ->where('user_id', '=', $idAlumno)->get();


        return view('users/examenesClase', compact('alumno', 'idClaseTrabajos', 'clase', 'examsEstudiante'));
    }

    public function sendNotification(){
        Mail::to(Auth::user()->email)->send(new NotificationMail());
        return new NotificationMail();
    }

    public function loadNotifications() {
        $idAlumno =  auth()->user()->id;

        $notifications = Notifications::where('student_id', $idAlumno)->first();
        return view('users/change-notifications', compact('notifications'));
    }

    public function updateNotifications(Request $request){
        $idAlumno =  auth()->user()->id;
        error_log($request);
        $inputValue = $request->all();

        $notifications = Notifications::where('student_id', $idAlumno)
            ->update([
                'work' => $request->work,
                'exam' => $request->exam,
                'continuos_assessment' => $request->continuos_assessment,
                'final_note' => $request->final_note
            ]);

            return response()->json(['success'=>'Data is successfully added']);

    
    }

}
