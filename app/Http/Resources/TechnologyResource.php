<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class TechnologyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'icon' => Str::startsWith($this->icon, 'http') ? $this->icon : 'https://api.svgl.app?search='.$this->icon,
            'projects' => ProjectResource::collection($this->whenLoaded('projects')),
        ];
    }
}
