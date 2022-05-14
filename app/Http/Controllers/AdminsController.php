<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Models\Course;
use App\Rules\Uppercase;
use App\Models\User;


class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *paper binbin
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users = DB::table('users')
            ->where("user_type", "=", "Student")
            ->get();
        //$users = User::all()->where('user_type' == 'Student');



        if(Gate::denies('user-only', auth()->user())){
            return view('admins.index', compact('users'));
        }else{
            return view('home');
        }
        


    }


    
}
