<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\User;
use Rap2hpoutre\FastExcel\FastExcel;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Attendance::class, 'attendance');
    }

    /**
     * export a listing of the resource.
     */
    public function export()
    {
        $this->authorize('export');
        $attendances = Attendance::all();

        // Export Data
        return (new FastExcel($attendances))->download('attendances.xlsx');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendances = Attendance::all();
        $users = User::whereHas('role', function ($query){
            $query->where('name', 'Teacher')->orWhere('name', 'Student');
        })->get();
        return view('dash.attendances.attendances', compact('attendances', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttendanceRequest $request)
    {
        $date = date("Y-m-d 00:00:00", strtotime($request->created_at));
        $collection = Attendance::where('user_id', $request->user_id)->where('created_at', $date)->pluck('duration');
        $sum = array_sum($collection->toArray());
        if($sum > 6){
            return back()->withErrors(['You have already reached the maximum daily duration.']);
        }

        Attendance::create($request->all());
        return redirect()->route('dash.attendances.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        $users = User::whereHas('role', function ($query){
            $query->where('name', 'Teacher')->orWhere('name', 'Student');
        })->get();
        return view('dash.attendances.update', compact('attendance', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttendanceRequest $request, Attendance $attendance)
    {
        $date = date("Y-m-d 00:00:00", strtotime($request->created_at));
        $collection = Attendance::where('user_id', $request->user_id)->where('created_at', $date)->pluck('duration');
        $sum = array_sum($collection->toArray());
        if($sum > 6){
            return back()->withErrors(['You have already reached the maximum daily duration.']);
        }

        $attendance->update($request->all());
        return redirect()->route('dash.attendances.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
    }
}
