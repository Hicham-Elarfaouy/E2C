<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Models\Subject;
use Rap2hpoutre\FastExcel\FastExcel;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Expense::class, 'expense');
    }

    /**
     * export a listing of the resource.
     */
    public function export()
    {
        $this->authorize('export', Expense::class);
        $expenses = Expense::all();

        // Export Data
        return (new FastExcel($expenses))->download('expenses.xlsx');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        $expenses = Expense::all();
        return view('dash.expenses.expenses', compact('expenses', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExpenseRequest $request)
    {
        if($request->type != 'subject'){
            $request['subject_id'] = null;
        }

        Expense::create($request->all());
        return redirect()->route('dash.expenses.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        $subjects = Subject::all();
        return view('dash.expenses.update', compact('expense', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        if($request->type != 'subject'){
            $request['subject_id'] = null;
        }

        $expense->update($request->all());
        return redirect()->route('dash.expenses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
    }
}
