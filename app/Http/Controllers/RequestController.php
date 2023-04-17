<?php

namespace App\Http\Controllers;

use App\Models\Request;
use App\Http\Requests\StoreRequestRequest;
use App\Http\Requests\UpdateRequestRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Rap2hpoutre\FastExcel\FastExcel;

class RequestController extends Controller
{
    /**
     * export a listing of the resource.
     */
    public function export()
    {
        $requests = Request::all();

        // Export Data
        return (new FastExcel($requests))->download('requests.xlsx');
    }

    /**
     * Update the specified resource in storage.
     */
    public function solve(Request $request)
    {
        $request->solve = true;
        $request->save();

        return redirect()->route('dash.requests.index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = Request::where('solve', false)->get();
        return view('dash.requests.requests', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dash.requests.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequestRequest $request)
    {
        $today = date("Y-m-d", strtotime(now()));
        $auth_id = Auth::user()->id;
        $limit_requests = Request::where('user_id', $auth_id)->where('created_at', 'like', "%$today%")->get();
        if($limit_requests->count()){
            return redirect()->back()->withErrors(['You have already reached the maximum daily requests.']);
        }
        $request['user_id'] = $auth_id;
        Request::create($request->all());
        return redirect()->route('dash.requests.user', $auth_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $obj = (object) array(
            'date' => date("d-m-Y | h:i", strtotime($request->created_at)),
            'student' => $request->user->name,
            'type' => $request->type,
            'description' => $request->description,
        );
        return $obj;
    }

    /**
     * Display the specified resource.
     */
    public function show_user(User $user)
    {
        $requests = Request::where('user_id', $user->id)->latest()->get();
        return view('dash.requests.show', compact('requests', 'user'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $request->delete();
    }
}
