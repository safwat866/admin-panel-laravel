<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $users = User::get();
        return view("admin.users.index", compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->can("add user")) {
            return back()->withErrors([
                "permession" => "You don't have permession to do this action"
            ]);
        }
        return view("admin.users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'number' => 'required|min:11',
        ]);

        if ($request->file('avatar')) {
            
            $path = $request->file('avatar')->store('users', 'public');
            $name = basename($path);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'number' => $request->number,
            'profile' => $name ?? "default.png",
        ]);

        return redirect()->route("users.index");
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
