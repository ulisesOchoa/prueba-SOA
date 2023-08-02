<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolSeeder extends Seeder
{
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $role = Role::create(['name' => 'superAdmin', 'display_name' => 'Super administrador']);

        $role = Role::create(['name' => 'moderator', 'display_name' => 'Moderador']);
        $role->givePermissionTo([
            'task.view',
            'task.create',
            'task.update',
            'task.delete'
        ]);
    }
}
