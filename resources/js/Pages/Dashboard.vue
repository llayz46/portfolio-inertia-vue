<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { X } from 'lucide-vue-next';
import { router, Link } from "@inertiajs/vue3";

defineProps({
    projects: Array,
    technologies: Array
})

const deleteTechnology = (id) => {
    router.delete(route('technologies.destroy', id), {
        method: 'delete',
        preserveState: true,
    })
}
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-white leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-zinc-1050 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8 flex gap-6">
                    <div class="w-1/2 rounded-md border border-zinc-1000 p-3">
                        <h3 class="text-lg font-semibold text-white">Projets</h3>

                        <ul role="list" class="pt-4 divide-y divide-zinc-1000">
                            <li v-for="project in projects" :key="project.id" class="px-4 py-4 sm:px-0">
                                <Link :href="route('projects.edit', { project: project.id, slug: project.slug })">
                                    <p>{{ project.name }}</p>
                                    <p class="text-sm pt-2 text-gray-400">{{ project.description }}</p>
                                </Link>
                            </li>
                        </ul>
                    </div>

                    <div class="w-1/2 rounded-md border border-zinc-1000 p-3">
                        <h3 class="text-lg font-semibold text-white">Technologies</h3>

                        <ul role="list" class="pt-4 divide-y divide-zinc-1000">
                            <li v-for="technology in technologies" :key="technology.id" class="flex items-center justify-between px-4 py-4 sm:px-0">
                                <div class="flex items-center">
                                    {{ technology.id }}.

                                    <template v-if="technology.icon.startsWith('http')">
                                        <img :src="technology.icon" class="ml-1.5 mr-2 size-4" alt="">
                                    </template>

                                    <template v-else>
                                        <div class="[&>svg]:ml-1.5 [&>svg]:mr-2 [&>svg]:size-4" v-html="technology.icon"></div>
                                    </template>

                                    {{ technology.name }}
                                </div>

                                <div class="p-1 bg-zinc-1000 hover:bg-zinc-950 cursor-pointer rounded" @click="deleteTechnology(technology.id)">
                                    <X :size="16" />
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
