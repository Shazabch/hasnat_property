<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::destroy(Permission::pluck('id'));

        Permission::create(['name' => 'user-management']);

        Permission::create(['name' => 'role-management']);


        $super_admin=Role::updateOrCreate(['name'=>'SuperAdmin']);

        $user=User::updateOrCreate(
            ['email'=>'superadmin@gmail.com'],
            [
            'name'=>'Super Admin',
            'password'=>Hash::make('admin')
            ]);

        $user->syncRoles($super_admin);

    }
}
