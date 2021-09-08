<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

// Spatie
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            // table roles
            'ver-role',
            'criar-role',
            'editar-role',
            'deletar-role',

            // table roles
            'ver-blog',
            'criar-blog',
            'editar-blog',
            'deletar-blog',
        ];

        foreach ($permissions as $permission)
        {
            Permission::create(['name' => $permission]);
        }

        // Criando um usuário 'Super Admin'
        $user = \App\Models\User::create([
            'name' => 'User Super Admin',
            'email' => 'usersuperadmin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
        ]);

        // Criando uma regra 'Super Admin'
        $role = Role::create(['name' => 'Super Admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole($role->id);

    }
}
