<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateValidationRequestWork;
use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *paper binbin
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Todas las matriculaciones
        $works = Work::all();



        return view('works.index', [
            'works' => $works,
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
        return view('works.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateValidationRequestWork $request)
    {

        //Esta forma de validar es usando la CreateValidationRequest que hemos creado en Requests
        $request->validated();

        //Otra forma
        $work = Work::create([

            'class_id' => $request->input('class_id'),
            'user_id' => $request->input('user_id'),
            'name' => $request->input('name'),
            'mark' => $request->input('mark'),

        ]);

        return redirect('/works');

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
        $work = Work::find($id);

        return view('works.edit')->with('work', $work);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateValidationRequestWork $request, $id)
    {
        $request->validated();

        $work = Work::where('id', $id)
            ->update([

                'class_id' => $request->input('class_id'),
                'user_id' => $request->input('user_id'),
                'name' => $request->input('name'),
                'mark' => $request->input('mark'),
        
            ]);

        return redirect('/works');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {

        $work->delete();

        return redirect('/works');
    }
}
