<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Inertia\Inertia;

class LandingController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Landing', [
            'projects' => fn () => ProjectResource::collection(Project::with('technologies')->latest()->get()),
        ]);
    }
}
