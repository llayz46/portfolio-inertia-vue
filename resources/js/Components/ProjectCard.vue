<script setup>
import { Link } from '@inertiajs/vue3';
import { ArrowUpRight } from 'lucide-vue-next';

defineProps({
    project: Object
})
</script>

<template>
    <li class="project-card">
        <img :src="project.image" class="relative z-10 rounded-xl sm:rounded-3xl" width="896" height="538" :alt="`Image du projet : ${project.name}`">

        <div class="mt-4">
            <Link :only="['project']" :href="project.routes.show" class="flex items-center gap-2 group">
                <h3 class="text-base md:text-xl">{{ project.name }}</h3>

                <ArrowUpRight class="w-4 h-6 text-white/50 group-hover:rotate-45 transition-transform duration-300" />
            </Link>

            <ul class="mt-4 flex flex-wrap gap-2.5 font-dm-sans text-xs">
                <li class="pointer-events-none flex items-center whitespace-nowrap gap-2 border border-[#24292F] py-0.5 px-2.5 md:px-3 rounded-full" v-for="technology in project.technologies">
                    <template v-if="technology.icon.startsWith('http')">
                        <img :src="technology.icon" class="size-3 md:size-4" :alt="`Icon de : ${technology.name}`">
                    </template>

                    <template v-else>
                        <div class="[&>svg]:size-3 [&>svg]:md:size-4" v-html="technology.icon"></div>
                    </template>

                    {{ technology.name }}
                </li>
            </ul>
        </div>
    </li>
</template>
