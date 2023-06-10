<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default_user_value = [
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];

        DB::beginTransaction();
        try {
            $admin = User::create(array_merge ([
                'name' => 'Kadek Satria Kantra Wibawa',
                'email' => 'kantrawibawa@gmail.com',
            ], $default_user_value));

            $developer = User::create(array_merge ([
                'name' => 'Kantra Wibawa',
                'email' => 'developer@gmail.com',
            ], $default_user_value));

            $manager = User::create(array_merge ([
                'name' => 'Satria Kantra',
                'email' => 'manager@gmail.com',
            ], $default_user_value));

            $role_admin = Role::create(['name' => 'admin']);
            $role_developer = Role::create(['name' => 'developer']);
            $role_manager = Role::create(['name' => 'manager']);

            $permission = Permission::create(['name' => 'read role']);
            $permission = Permission::create(['name' => 'created role']);
            $permission = Permission::create(['name' => 'updated role']);
            $permission = Permission::create(['name' => 'delete role']);

            $admin->assignRole('admin');
            $developer->assignRole('developer');
            $manager->assignRole('manager');

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }


    }
}
