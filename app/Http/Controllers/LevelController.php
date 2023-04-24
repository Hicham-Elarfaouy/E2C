<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Http\Requests\StoreLevelRequest;
use App\Http\Requests\UpdateLevelRequest;
use Rap2hpoutre\FastExcel\FastExcel;

class LevelController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Level::class, 'level');
    }

    /**
     * export a listing of the resource.
     */
    public function export()
    {
        $this->authorize('export', Level::class);
        $levels = Level::all();

        // Export Data
        return (new FastExcel($levels))->download('levels.xlsx');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $levels = Level::all();
        return view('dash.levels.levels', compact('levels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLevelRequest $request)
    {
        Level::create($request->all());
        return redirect()->route('dash.levels.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Level $level)
    {
        return view('dash.levels.update', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLevelRequest $request, Level $level)
    {
        $level->update($request->all());
        return redirect()->route('dash.levels.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Level $level)
    {
        $level->delete();
    }
}
