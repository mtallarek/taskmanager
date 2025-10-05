<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserRole::factory()->create([
            'label' => 'Administrator',
            'name' => 'admin'
        ]);

        UserRole::factory()->create([
            'label' => 'Default user',
            'name' => 'user'
        ]);

        UserRole::factory(2)->create();

    }
}
