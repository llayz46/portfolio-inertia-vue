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

        $technologies = [
            ['name' => 'Vue', 'icon' => 'https://svgl.app/library/vue.svg'],
            ['name' => 'Nuxt', 'icon' => 'https://svgl.app/library/nuxt.svg'],
            ['name' => 'Bootstrap', 'icon' => 'https://svgl.app/library/bootstrap.svg'],
            ['name' => 'Gatsby', 'icon' => 'https://svgl.app/library/gatsby.svg'],
            ['name' => 'Tailwind CSS', 'icon' => 'https://svgl.app/library/tailwindcss.svg'],
            ['name' => 'Angular', 'icon' => 'https://svgl.app/library/angular.svg'],
            ['name' => 'Blitz', 'icon' => 'https://svgl.app/library/blitzjs.svg'],
            ['name' => 'Astro', 'icon' => 'https://svgl.app/library/astro.svg'],
            ['name' => 'Solidjs', 'icon' => 'https://svgl.app/library/solidjs.svg'],
            ['name' => 'Moon', 'icon' => 'https://svgl.app/library/moon.svg'],
            ['name' => 'Express.js', 'icon' => 'https://svgl.app/library/expressjs.svg'],
            ['name' => 'Fastify', 'icon' => 'https://svgl.app/library/fastify.svg'],
            ['name' => 'Qwik', 'icon' => 'https://svgl.app/library/qwik.svg'],
            ['name' => 'NestJS', 'icon' => 'https://svgl.app/library/nestjs.svg'],
            ['name' => 'Playwright', 'icon' => 'https://svgl.app/library/playwright.svg'],
            ['name' => 'Ember', 'icon' => 'https://svgl.app/library/ember.svg'],
            ['name' => 'Flutter', 'icon' => 'https://svgl.app/library/flutter.svg'],
            ['name' => 'Fresh', 'icon' => 'https://svgl.app/library/fresh.svg'],
            ['name' => 'Jasmine', 'icon' => 'https://svgl.app/library/jasmine.svg'],
            ['name' => 'Jest', 'icon' => 'https://svgl.app/library/jest.svg'],
            ['name' => 'KrakenJS', 'icon' => 'https://svgl.app/library/krakenjs.svg'],
            ['name' => 'Laravel', 'icon' => 'https://svgl.app/library/laravel.svg'],
            ['name' => 'Material UI', 'icon' => 'https://svgl.app/library/materialui.svg'],
            ['name' => 'PM2', 'icon' => 'https://svgl.app/library/pm2.svg'],
            ['name' => 'React Query', 'icon' => 'https://svgl.app/library/reactquery.svg'],
            ['name' => 'RedwoodJS', 'icon' => 'https://svgl.app/library/redwoodjs.svg'],
            ['name' => 'Sequelize', 'icon' => 'https://svgl.app/library/sequelize.svg'],
            ['name' => 'Stimulus', 'icon' => 'https://svgl.app/library/stimulus.svg'],
            ['name' => 'WindiCSS', 'icon' => 'https://svgl.app/library/windicss.svg'],
            ['name' => 'Hugo', 'icon' => 'https://svgl.app/library/hugo.svg'],
            ['name' => 'Hono', 'icon' => 'https://svgl.app/library/hono.svg'],
            ['name' => 'FastAPI', 'icon' => 'https://svgl.app/library/fastapi.svg'],
            ['name' => 'Crossplane', 'icon' => 'https://svgl.app/library/crossplane.svg'],
            ['name' => 'Remotion', 'icon' => 'https://svgl.app/library/remotion.svg'],
            ['name' => 'SST', 'icon' => 'https://svgl.app/library/sst.svg'],
            ['name' => 'Django', 'icon' => 'https://svgl.app/library/django.svg'],
            ['name' => 'Cypress', 'icon' => 'https://svgl.app/library/cypress.svg'],
            ['name' => 'Spring', 'icon' => 'https://svgl.app/library/spring.svg'],
            ['name' => 'Remix', 'icon' => 'https://svgl.app/library/remix_light.svg'],
            ['name' => 'Flask', 'icon' => 'https://svgl.app/library/flask-light.svg'],
            ['name' => 'ElysiaJS', 'icon' => 'https://svgl.app/library/elysiajs.svg'],
            ['name' => 'Refine', 'icon' => 'https://svgl.app/library/refine_dark.svg'],
            ['name' => 'Next.js', 'icon' => 'https://svgl.app/library/nextjs_icon_dark.svg'],
            ['name' => 'Flowbite', 'icon' => 'https://svgl.app/library/flowbite.svg'],
            ['name' => 'T3 Stack', 'icon' => 'https://svgl.app/library/t3-dark.svg'],
            ['name' => 'Vitest', 'icon' => 'https://svgl.app/library/vitest.svg'],
            ['name' => 'tRPC', 'icon' => 'https://svgl.app/library/trpc.svg']
        ];

        foreach ($technologies as $tech) {
            Technology::factory()->create([
                'name' => $tech['name'],
                'icon' => $tech['icon'],
            ]);
        }
    }
}
