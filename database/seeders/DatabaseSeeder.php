<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@test.fr',
            'password' => bcrypt('test'),
        ]);

        Technology::factory(25)->create();

        Project::factory(15)->create()->each(function ($project) {
            $project->technologies()->attach(Technology::all()->random(3));
        });
    }
}
