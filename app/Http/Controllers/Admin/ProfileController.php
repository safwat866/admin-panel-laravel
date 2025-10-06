<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view("admin.auth.profile");
    }

    public function update(Request $request, $id)
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

        $user = User::find($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'number' => $request->number,
            'profile' => $name ?? Auth::user()->profile,
        ]);

        return redirect()->route("profile.index");
    }
}
