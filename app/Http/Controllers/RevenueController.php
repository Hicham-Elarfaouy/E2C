<?php

namespace App\Http\Controllers;

use App\Models\Revenue;
use App\Http\Requests\StoreRevenueRequest;
use App\Http\Requests\UpdateRevenueRequest;
use Rap2hpoutre\FastExcel\FastExcel;

class RevenueController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Revenue::class, 'revenue');
    }

    /**
     * export a listing of the resource.
     */
    public function export()
    {
        $this->authorize('export', Revenue::class);
        $revenues = Revenue::all();

        // Export Data
        return (new FastExcel($revenues))->download('revenues.xlsx');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $revenues = Revenue::all();
        return view('dash.revenues.revenues', compact('revenues'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRevenueRequest $request)
    {
        Revenue::create($request->all());
        return redirect()->route('dash.revenues.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Revenue $revenue)
    {
        return view('dash.revenues.update', compact('revenue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRevenueRequest $request, Revenue $revenue)
    {
        $revenue->update($request->all());
        return redirect()->route('dash.revenues.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Revenue $revenue)
    {
        $revenue->delete();
    }
}
