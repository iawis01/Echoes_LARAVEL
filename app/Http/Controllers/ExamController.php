<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateValidationRequestExam;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *paper binbin
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Todas las matriculaciones
        $exams = Exam::all();



        return view('exams.index', [
            'exams' => $exams,
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
        return view('exams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateValidationRequestExam $request)
    {

        //Esta forma de validar es usando la CreateValidationRequest que hemos creado en Requests
        $request->validated();

        //Otra forma
        $exam = Exam::create([

            'class_id' => $request->input('class_id'),
            'user_id' => $request->input('user_id'),
            'name' => $request->input('name'),
            'mark' => $request->input('mark'),

        ]);

        return redirect('/exams');

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
        $exam = Exam::find($id);

        return view('exams.edit')->with('exam', $exam);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateValidationRequestExam $request, $id)
    {
        $request->validated();

        $exam = Exam::where('id', $id)
            ->update([

                'class_id' => $request->input('class_id'),
                'user_id' => $request->input('user_id'),
                'name' => $request->input('name'),
                'mark' => $request->input('mark'),
        
            ]);

        return redirect('/exams');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {

        $exam->delete();

        return redirect('/exams');
    }
}
