<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view("admin.roles.index", compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view("admin.roles.create", compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cred = $request->validate([
            'name' => 'required',
            'permissions' => 'required',
        ]);
        
        $role = Role::create(['name' => $request->name]);

        $role->givePermissionTo($request->permissions);

        return redirect()->route('roles.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!Auth::user()->can("edit roles")) {
            return back()->withErrors([
                "permession" => "You don't have permession to do this action"
            ]);
        }
        $permissions = Permission::all();

        $role = Role::find($id);
        $permissionsWithRule = $role->permissions;

        return view("admin.roles.edit", compact('permissions', 'permissionsWithRule', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cred = $request->validate([
            'name' => 'required',
            'permissions' => 'required',
        ]);
        
        $role = Role::findOrFail($id);

        $role->syncPermissions($request->permissions);

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('roles.index');
    }
    public function bulkDelete(Request $request) {
        
        Role::destroy($request->roles);
        return back();
    }
}
