<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Schedule;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\Subject;
use Rap2hpoutre\FastExcel\FastExcel;

class ScheduleController extends Controller
{
    /**
     * export a listing of the resource.
     */
    public function export()
    {
        $schedules = Schedule::all();

        // Export Data
        return (new FastExcel($schedules))->download('schedules.xlsx');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::all();
        $subjects = Subject::all();
        $classrooms = Classroom::all();

        return view('dash.schedules.schedules', compact('schedules', 'subjects', 'classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScheduleRequest $request)
    {
        $schedule_exist = Schedule::where('subject_id', $request->subject_id)
            ->where('classroom_id', $request->classroom_id)
            ->where('day', $request->day)->where('hour', $request->hour)->first();

        if ($schedule_exist){
            return redirect()->back()->withErrors('This schedule already exist.');
        }

        Schedule::create($request->all());
        return redirect()->route('dash.schedules.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        $subjects = Subject::all();
        $classrooms = Classroom::all();
        return view('dash.schedules.update', compact('schedule', 'subjects', 'classrooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScheduleRequest $request, Schedule $schedule)
    {
        $schedule_exist = Schedule::where('subject_id', $request->subject_id)
            ->where('classroom_id', $request->classroom_id)
            ->where('day', $request->day)->where('hour', $request->hour)->first();

        if ($schedule_exist){
            return redirect()->back()->withErrors('This schedule already exist.');
        }

        $schedule->update($request->all());
        return redirect()->route('dash.schedules.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
    }
}
