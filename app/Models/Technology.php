<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Technology extends Model
{
    /** @use HasFactory<\Database\Factories\TechnologyFactory> */
    use HasFactory;

    public $fillable = ['name', 'icon'];

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class);
    }
}
