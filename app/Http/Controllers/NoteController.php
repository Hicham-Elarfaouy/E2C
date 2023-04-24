<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Models\Subject;
use App\Models\User;
use Rap2hpoutre\FastExcel\FastExcel;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Note::class, 'note');
    }

    /**
     * export a listing of the resource.
     */
    public function export()
    {
        $this->authorize('export');
        $notes = Note::all();

        // Export Data
        return (new FastExcel($notes))->download('notes.xlsx');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::all();
        $subjects = Subject::all();
        $users = User::whereHas('role', function ($query){
            $query->where('name', 'Student');
        })->get();

        return view('dash.notes.notes', compact('notes', 'subjects', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoteRequest $request)
    {
        Note::create($request->all());
        return redirect()->route('dash.notes.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        $subjects = Subject::all();
        $users = User::whereHas('role', function ($query){
            $query->where('name', 'Student');
        })->get();

        return view('dash.notes.update', compact('note', 'subjects', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoteRequest $request, Note $note)
    {
        $note->update($request->all());
        return redirect()->route('dash.notes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $note->delete();
    }
}
