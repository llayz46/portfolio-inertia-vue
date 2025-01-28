<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\TechnologyResource;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Project/Create', [
            'technologies' => fn () => TechnologyResource::collection(Technology::all())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $validated = $request->validated();

        $technologies = collect($validated['technologies'])->map(fn ($technology) => $technology['id']);

        Project::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'slug' => Str::slug($validated['slug']),
            'url' => $validated['url'],
            'github' => $validated['github'],
            'year' => $validated['year'],
            'image' => $validated['image']->storeAs('projects', $validated['slug'], 'public'),
        ])->technologies()->sync($technologies);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Project $project)
    {
        if (!Str::contains($project->showRoute(), $request->path())) {
            return redirect($project->showRoute());
        }

        $project->load('technologies');

        return inertia('Project/Show', [
            'project' => fn () => ProjectResource::make($project)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
