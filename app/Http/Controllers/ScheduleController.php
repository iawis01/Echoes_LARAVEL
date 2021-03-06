<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateValidationRequestSchedule;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *paper binbin
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Todos los cursos
        $schedules = Schedule::all();

        return view('schedules.index', [
            'schedules' => $schedules,
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
        return view('schedules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateValidationRequestSchedule $request)
    {

        //Esta forma de validar es usando la CreateValidationRequest que hemos creado en Requests
        $request->validated();

        //Otra forma
        $schedule = Schedule::create([

            'class_id' => $request->input('class_id'),
            'time_start' => $request->input('time_start'),
            'time_end' => $request->input('time_end'),
            'day' => $request->input('day'),
        ]);

        return redirect('/schedules');

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
        $schedule = Schedule::find($id);

        return view('schedules.edit')->with('schedule', $schedule);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateValidationRequestSchedule $request, $id)
    {
        $request->validated();

        $schedule = Schedule::where('id', $id)
            ->update([

              'class_id' => $request->input('class_id'),
              'time_start' => $request->input('time_start'),
              'time_end' => $request->input('time_end'),
              'day' => $request->input('day'),
            ]);

        return redirect('/schedules');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {

        $schedule->delete();

        return redirect('/schedules');
    }
}
