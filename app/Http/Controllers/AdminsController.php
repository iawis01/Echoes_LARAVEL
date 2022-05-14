<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

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

        if (Gate::denies('user-only', auth()->user())) {
            return view('admins.index', compact('users'));
        } else {
            return view('welcome');
        }

    }

}
