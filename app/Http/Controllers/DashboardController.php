<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Http\Resources\TechnologyResource;
use App\Models\Project;
use App\Models\Technology;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return inertia('Dashboard', [
            'projects' => fn () => ProjectResource::collection(Project::latest()->get()),
            'technologies' => fn () => TechnologyResource::collection(Technology::all())
        ]);
    }
}
