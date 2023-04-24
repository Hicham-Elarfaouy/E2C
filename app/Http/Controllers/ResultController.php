<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Http\Requests\StoreResultRequest;
use App\Http\Requests\UpdateResultRequest;
use App\Models\User;
use Rap2hpoutre\FastExcel\FastExcel;

class ResultController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Result::class, 'result');
    }

    /**
     * export a listing of the resource.
     */
    public function export()
    {
        $this->authorize('export', Result::class);
        $results = Result::all();

        // Export Data
        return (new FastExcel($results))->download('results.xlsx');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = Result::all();
        $users = User::whereHas('role', function ($query){
            $query->where('name', 'Student');
        })->get();

        return view('dash.results.results', compact('results', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResultRequest $request)
    {
        Result::create($request->all());
        return redirect()->route('dash.results.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Result $result)
    {
        $users = User::whereHas('role', function ($query){
            $query->where('name', 'Student');
        })->get();

        return view('dash.results.update', compact('result', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResultRequest $request, Result $result)
    {
        $result->update($request->all());
        return redirect()->route('dash.results.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Result $result)
    {
        $result->delete();
    }
}
