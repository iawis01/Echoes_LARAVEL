<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateValidationRequestClase;
use App\Models\Clase;
use Illuminate\Http\Request;


class ClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *paper binbin
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Todos los cursos
        $clases = Clase::all();


        return view('classes.index', [
            'clases' => $clases,
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
        return view('classes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateValidationRequestClase $request)
    {

        //Esta forma de validar es usando la CreateValidationRequest que hemos creado en Requests
        $request->validated();

        //Otra forma
        $clase = Clase::create([

            'user_id' => $request->input('user_id'),
            'course_id' => $request->input('course_id'),
            'schedule_id' => $request->input('schedule_id'),
            'name' => $request->input('name'),
            'color' => $request->input('color'),
        ]);

        return redirect('/classes');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_class)
    {
        return $id_class;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_class)
    {
        $clase = Clase::find($id_class);

        return view('classes.edit')->with('clase', $clase);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateValidationRequestClase $request, $id_class)
    {
        $request->validated();

        $clase = Clase::where('id_class', $id_class)
            ->update([

                'user_id' => $request->input('user_id'),
                'course_id' => $request->input('course_id'),
                'schedule_id' => $request->input('schedule_id'),
                'name' => $request->input('name'),
                'color' => $request->input('color'),
            ]);

        return redirect('/classes');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clase $clase)
    {

        $clase->delete();

        return redirect('/classes');
    }
}
