<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateValidationRequestPercentage;

use App\Models\Percentage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PercentageController extends Controller
{
    /**
     * Display a listing of the resource.
     *paper binbin
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Todas los percentage
        $percentages = Percentage::all();



        return view('percentages.index', [
            'percentages' => $percentages,
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
        return view('percentages.create');
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(CreateValidationRequestPercentage $request)
    {

        //Esta forma de validar es usando la CreateValidationRequest que hemos creado en Requests
        $request->validated();
        

        //Otra forma
        $percentage = Percentage::create([

            'course_id' => $request->input('course_id'),
            'class_id' => $request->input('class_id'),
            'continuous_assessment' => $request->input('continuous_assessment'),
            'exams' => $request->input('exams'),

        ]);

        return redirect('/percentages');

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
        $percentage = Percentage::find($id);

        return view('percentages.edit')->with('percentage', $percentage);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateValidationRequestPercentage $request, $id)
    {
        $request->validated();

        $percentage = Percentage::where('id', $id)
            ->update([

                'course_id' => $request->input('course_id'),
                'class_id' => $request->input('class_id'),
                'continuous_assessment' => $request->input('continuous_assessment'),
                'exams' => $request->input('exams'),
        
            ]);

        return redirect('/percentages');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Percentage $percentage)
    {

        $percentage->delete();

        return redirect('/percentages');
    }
}
