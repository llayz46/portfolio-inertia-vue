<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Psr\Http\Message\UriInterface;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('generate:sitemap', function () {
    $sitemapPath = public_path('sitemap.xml');

    $projects = \App\Models\Project::all();

    $sitemap = Sitemap::create()
        ->add('/');

    foreach ($projects as $project) {
        $sitemap->add(Url::create(route('projects.show', ['project' => $project, 'slug' => $project->slug]))
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            ->setPriority(0.8));
    }

    $sitemap->writeToFile($sitemapPath);
});
