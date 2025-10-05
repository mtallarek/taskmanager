<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::factory()->create([
            'title' => 'Project 1',
        ]);

        Project::factory()->create([
            'title' => 'Project 2',
        ]);

        Project::factory(3)->create();

    }
}
