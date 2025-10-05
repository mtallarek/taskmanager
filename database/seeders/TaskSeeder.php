<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Task::factory()->create([
            'title' => 'Root task',
            'deadline' => '2026-01-01',
            'user_id' => 1
        ]);

        Task::factory()->create([
            'title' => 'overdue 1',
            'deadline' => '2020-01-01'
        ]);

        Task::factory()->create([
            'title' => 'overdue 2',
            'deadline' => '1970-01-01'
        ]);

        Task::factory()->create([
            'title' => 'overdue 3',
            'deadline' => '1970-01-01',
            'user_id' => 2
        ]);

        Task::factory()->create([
            'title' => 'due date today',
            'deadline' => date('Y-m-d')
        ]);

        Task::factory(10)->create();
    }
}
