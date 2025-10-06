<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // roles
        $role = Role::create(['name' => 'Admin']);

        // permissions
        Permission::create(['name' => 'view dashboard']);
        Permission::create(['name' => 'add user']);
        Permission::create(['name' => 'edit admin']);
        Permission::create(['name' => 'edit roles']);

        $role->givePermissionTo(['view dashboard', 'add user', 'edit admin', 'edit roles']);

        $user = User::where('name', 'Admin')->first();

        $user->assignRole('Admin');
    }
}
