<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateValidationRequestEnrollment;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *paper binbin
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Todas las matriculaciones
        $enrollments = Enrollment::all();



        return view('enrollments.index', [
            'enrollments' => $enrollments,
        ]);

    }

    public function about()
    {
        return 'About Us Page';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('enrollments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateValidationRequestEnrollment $request)
    {

        //Esta forma de validar es usando la CreateValidationRequest que hemos creado en Requests
        $request->validated();

        //Otra forma
        $enrollment = Enrollment::create([

            'course_id' => $request->input('course_id'),
            'user_id' => $request->input('user_id'),

        ]);

        return redirect('/enrollments');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enrollment = Enrollment::find($id);

        return view('enrollments.edit')->with('enrollment', $enrollment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateValidationRequestEnrollment $request, $id)
    {
        $request->validated();

        $enrollment = Enrollment::where('id', $id)
            ->update([

                'course_id' => $request->input('course_id'),
                 'user_id' => $request->input('user_id'),
        
            ]);

        return redirect('/enrollments');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enrollment $enrollment)
    {

        $enrollment->delete();

        return redirect('/enrollments');
    }
}
