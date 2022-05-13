<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Models\Course;
use App\Rules\Uppercase;


class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *paper binbin
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if(Gate::denies('user-only', auth()->user())){
            return view('admins.index');
        }else{
            return view('welcome');
        }
        


    }


    
}
