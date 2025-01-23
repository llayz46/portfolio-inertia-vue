<?php

use App\Models\Project;
use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\post;

it('requires authentification', function () {
    post(route('projects.store'))->assertRedirect(route('login'));
});

it('stores a project', function () {
    $user = User::factory()->create();

    $data = [
        'name' => 'Project Name',
        'description' => 'Project Description',
        'image' => 'Project Image',
        'slug' => 'project-name',
        'url' => 'Project URL',
        'github' => 'Project Github',
        'year' => 2025,
    ];

    actingAs($user)->post(route('projects.store'), $data);

    $this->assertDatabaseHas(Project::class, $data);
});
