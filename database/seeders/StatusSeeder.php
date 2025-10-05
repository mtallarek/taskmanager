<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::factory()->create([
            'label' => 'TO DO',
        ]);
        Status::factory()->create([
            'label' => 'In progress',
        ]);
        Status::factory()->create([
            'label' => 'Done',
        ]);

        Status::factory(2)->create();

    }
}
