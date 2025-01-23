<?php

namespace App\Http\Controllers;

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
        $technologies = TechnologyResource::collection(Technology::all());

        return inertia('Project/Create', [
            'technologies' => $technologies
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image',
            'slug' => 'required|string',
            'url' => 'required|url',
            'github' => 'nullable|url',
            'year' => 'required|integer'
        ]);

        $project = Project::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Project $project)
    {
        if (!Str::contains($project->showRoute(), $request->path())) {
            return redirect($project->showRoute());
        }

        return new ProjectResource($project->with('technologies')->first());
//        return inertia('Project/Show', [
//            'project' => fn () => new ProjectResource($project)
//        ]);
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
