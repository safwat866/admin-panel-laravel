<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = User::role("admin")->get();
        return view("admin.admins.index", compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->can("edit admin")) {
            return back()->withErrors([
                "permession" => "You don't have permession to do this action"
            ]);
        }

        return view("admin.admins.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'email' => 'required',
            'number' => 'required',
        ]);

        if ($request->file('avatar')) {
            $path = $request->file('avatar')->store('users', 'public');
            $name = basename($path);
        }

        $admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'number' => $request->number,
            'profile' => $name ?? 'default.png',
        ]);

        $admin->assignRole("Admin");
        
        return redirect()->route("admins.index");
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!Auth::user()->can("edit admin")) {
            return back()->withErrors([
                "permession" => "You don't have permession to do this action"
            ]);
        }
        
        $admin = User::find($id);
        $roles = Role::all();
        return view("admin.admins.edit", compact("admin", "roles"));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'email' => 'required',
            'number' => 'required',
            'roles' => 'required',
        ]);

        if ($request->file('avatar')) {
            $path = $request->file('avatar')->store('users', 'public');
            $name = basename($path);
        }

        $user = User::find($id);
        
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'number' => $request->number,
            'profile' => $name ?? 'default.png',
        ]);

        $user->syncRoles( [$request->roles]);
    
        return redirect()->route("admins.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route("admins.index");
    }

    public function bulkDelete(Request $request) {
        User::destroy($request->users);
        return back();
    }
}
