<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\TechnologyResource;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

        return redirect()->route('projects.create')->banner('Projet créer avec succès.');
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
        $project->load('technologies');

        return inertia('Project/Edit', [
            'project' => fn () => ProjectResource::make($project),
            'technologies' => fn () => TechnologyResource::collection(Technology::all())
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'url' => ['required', 'url'],
            'github' => ['nullable', 'url'],
            'year' => ['required', 'integer'],
            'image' => ['nullable', 'image'],
            'technologies' => ['required', 'array'],
            'technologies.*.id' => ['required', 'integer', 'exists:technologies,id'],
        ]);

        $technologies = collect($validated['technologies'])->map(fn ($technology) => $technology['id']);

        if ($validated['image'] && Storage::disk('public')->exists($project->image)) {
            Storage::disk('public')->delete($project->image);
        }

        $imagePath = $validated['image']
            ? $validated['image']->storeAs('projects', $validated['slug'], 'public')
            : $project->image;

        $project->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'slug' => Str::slug($validated['slug']),
            'url' => $validated['url'],
            'github' => $validated['github'],
            'year' => $validated['year'],
            'image' => $imagePath,
        ]);

        $project->technologies()->sync($technologies);

        return redirect()->route('projects.edit', ['project' => $project, 'slug' => $project->slug])->banner('Projet mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
