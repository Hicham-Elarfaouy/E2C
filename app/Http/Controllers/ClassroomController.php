<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Http\Requests\StoreClassroomRequest;
use App\Http\Requests\UpdateClassroomRequest;
use Rap2hpoutre\FastExcel\FastExcel;

class ClassroomController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Classroom::class, 'classroom');
    }

    /**
     * export a listing of the resource.
     */
    public function export()
    {
        $this->authorize('export');
        $classrooms = Classroom::all();

        // Export Data
        return (new FastExcel($classrooms))->download('classrooms.xlsx');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classrooms = Classroom::all();

        return view('dash.classrooms.classrooms', compact('classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClassroomRequest $request)
    {
        Classroom::create($request->all());

        return redirect()->route('dash.classrooms.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classroom $classroom)
    {
        return view('dash.classrooms.update', compact('classroom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassroomRequest $request, Classroom $classroom)
    {
        $classroom->update($request->all());
        return redirect()->route('dash.classrooms.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom)
    {
        $classroom->delete();
    }
}
