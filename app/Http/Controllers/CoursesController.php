<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Rules\Uppercase;
use App\Http\Requests\CreateValidationRequestCourse;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *paper binbin
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Todos los cursos
        $courses = Course::all();

        //Un curso especifico
        /*$courses = Course::where('id_course', '=', '1')
        ->get();*/

       

        return view('courses.index', [
            'courses' => $courses
        ]);


    }

    public function about(){
        return 'About Us Page';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateValidationRequestCourse $request)
    {
        


        //Esta forma de validar es usando la CreateValidationRequest que hemos creado en Requests
        $request->validated();

       

        //Otra forma
        $course = Course::create([

            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'date_start' => $request->input('date_start'),
            'date_end' => $request->input('date_end'),
            'active' => $request->input('active')
        ]);

        return redirect('/courses');


        //Una forma de hacerlo
        // $course = new Course;
        // $course->name = $request->input('name');
        // $course->description = $request->input('description');
        // $course->date_start = $request->input('date_start');
        // $course->date_end = $request->input('date_end');
        // $course->active = $request->input('active');
        // $course->save();


         //Para validar con Request $ request
        //validate method sirve para comprobar los datos que vienen del request
        //comprueba. Si es válido continuará con el Course::create
        //si no es valido, lanza una ValidationException
        /*$request->validate([
                // usamos | para añadir mas de una "regla"
            'name' => 'required',
            'description' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'active' =>  'required' 

           // 'ejemploInteger' =>  'required|integer|min:0|max:1000' 
           // 'ejemploReglaPropia' =>  new Uppercase, 
        ]);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_course)
    {
        return $id_course;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_course)
    {
        $course = Course::find($id_course);

        return view('courses.edit')->with('course', $course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_course
     * @return \Illuminate\Http\Response
     */
    public function update(CreateValidationRequestCourse $request, $id_course)
    {
        $request->validated();
 

        $course = Course::where('id_course', $id_course)
            ->update([

                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'date_start' => $request->input('date_start'),
                'date_end' => $request->input('date_end'),
                'active' => $request->input('active')
        ]);

        return redirect('/courses');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {

        $course->delete();

        return redirect('/courses');
    }
}
