<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Status;
use App\Models\Project;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $rootUser = User::factory()->create([
            'name' => 'root',
            'email' => 'root@example.com',
        ]);

        PersonalAccessToken::create([
            'tokenable_type' => User::class,
            'tokenable_id'   => $rootUser->id,
            'name'           => 'Root token',
            'token'          => hash('sha256', 'meIsDev42'),
            'abilities'      => ['*'],
        ]);

        User::factory()->create([
            'name' => 'user 1',
            'email' => 'user1@example.com',
        ]);
        User::factory()->create([
            'name' => 'user 2',
            'email' => 'user2@example.com',
        ]);

        Status::factory()->create([
            'label' => 'TO DO',
        ]);
        Status::factory()->create([
            'label' => 'In progress',
        ]);
        Status::factory()->create([
            'label' => 'Done',
        ]);

        Project::factory()->create([
            'title' => 'Project 1',
        ]);

        Project::factory()->create([
            'title' => 'Project 2',
        ]);

    }
}
