<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $items = [
            ['id' => 1, 'name' => 'task.view', 'display_name' => 'Ver tareas', 'guard_name' => 'web'],
            ['id' => 2, 'name' => 'task.create', 'display_name' => 'Crear tareas', 'guard_name' => 'web'],
            ['id' => 3, 'name' => 'task.update', 'display_name' => 'Editar tareas', 'guard_name' => 'web'],
            ['id' => 4, 'name' => 'task.delete', 'display_name' => 'Eliminar tareas', 'guard_name' => 'web'],

            ['id' => 5, 'name' => 'user.view', 'display_name' => 'Ver usuarios', 'guard_name' => 'web'],
            ['id' => 6, 'name' => 'user.create', 'display_name' => 'Crear usuarios', 'guard_name' => 'web'],
            ['id' => 7, 'name' => 'user.update', 'display_name' => 'Editar usuarios', 'guard_name' => 'web'],
            ['id' => 8, 'name' => 'user.delete', 'display_name' => 'Eliminar usuarios', 'guard_name' => 'web']             
        ];

        foreach ($items as $item) {
            Permission::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
