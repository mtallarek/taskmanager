<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Laravel\Sanctum\PersonalAccessToken;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rootUser = User::factory()->create([
            'name' => 'root',
            'email' => 'root@example.com',
            'user_role_id' => 1,
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
            'user_role_id' => 2,
        ]);
        User::factory()->create([
            'name' => 'user 2',
            'email' => 'user2@example.com',
        ]);

        User::factory(3)->create();
    }
}
