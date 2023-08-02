<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $tasks = [
            [
                'user_id' => 1,
                'name' => 'Tarea 1',
                'description' => 'Descripción de la Tarea 1',
                'priority' => 'alta',
            ],
            [
                'user_id' => 1,
                'name' => 'Tarea 2',
                'description' => 'Descripción de la Tarea 2',
                'priority' => 'media',
            ],
            [
                'user_id' => 1,
                'name' => 'Tarea 3',
                'description' => 'Descripción de la Tarea 3',
                'priority' => 'baja',
            ]
        ];

        DB::table('tasks')->insert($tasks);
    }
}
