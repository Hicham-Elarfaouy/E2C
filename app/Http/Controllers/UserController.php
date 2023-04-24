<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Level;
use App\Models\Role;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Rap2hpoutre\FastExcel\FastExcel;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * export a listing of the resource.
     */
    public function export()
    {
        $this->authorize('export', User::class);
        $users = User::all();

        // Export Data
        return (new FastExcel($users))->download('users.xlsx');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user()->id;
        $users = User::where('id', '!=', $user)->get();
        return view('dash.users.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $classrooms = Classroom::all();
        $levels = Level::all();
        return view('dash.users.add_user', compact('roles', 'classrooms', 'levels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $request->merge(['password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi']);
        User::create($request->all());

        return redirect()->route('dash.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('dash.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $classrooms = Classroom::all();
        $levels = Level::all();
        return view('dash.users.update_user', compact('user', 'roles', 'classrooms', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());

        return redirect()->route('dash.users.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_password(Request $request, User $user)
    {
        $this->authorize('update_password', User::class);
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('dash.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
    }
}
