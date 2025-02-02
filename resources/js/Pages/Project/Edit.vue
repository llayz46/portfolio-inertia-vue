<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm, router } from "@inertiajs/vue3";
import {computed, ref} from 'vue';
import InputLabel from "@/Components/Jetstream/InputLabel.vue";
import TextInput from "@/Components/Jetstream/TextInput.vue";
import InputError from "@/Components/Jetstream/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/Jetstream/SecondaryButton.vue";
import DialogModal from "@/Components/Jetstream/DialogModal.vue";
import { X } from 'lucide-vue-next';

const showTechnologyModal = ref(false);

const props = defineProps({
    project: Object,
    technologies: Array,
    errors: Object
});

const form = useForm({
    name: props.project.name,
    description: props.project.description,
    image: null,
    slug: props.project.slug,
    url: props.project.url,
    github: props.project.github ? props.project.github : '',
    year: props.project.year,
    technologies: Array.from(props.project.technologies),
})

const submit = () => {
    form.technologies = Array.from(technologiesSet.value)

    router.post(route('projects.update', props.project), {
        _method: 'put',
        name: form.name,
        description: form.description,
        slug: form.slug,
        url: form.url,
        github: form.github,
        year: form.year,
        technologies: form.technologies,
        image: form.image,
        preserveState: true,
        onSuccess: () => {
            form.reset()
        },
    })
}

const technologiesSet = ref(new Set(Array.from(props.project.technologies)))
const filteredTechnologies = computed(() => props.technologies.filter(t => !technologiesSet.value.has(t.name)))
</script>

<template>
    <AppLayout title="Modifier un projet">
        <template #header>
            <h2 class="font-semibold text-xl text-white leading-tight">
                Modifier le projet : {{ project.name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-zinc-1050 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                    <form class="mt-10" enctype="multipart/form-data" @submit.prevent="submit">
                        <div class="flex flex-col gap-6">
                            <div>
                                <InputLabel for="name" value="Nom du projet" />
                                <TextInput
                                    id="name"
                                    v-model="form.name"
                                    @input="form.slug = $event.target.value.toLowerCase().replace(/[^a-z0-9]/g, '-')"
                                    type="text"
                                    class="mt-1 block w-full"
                                    required
                                />
                                <InputError class="mt-2" :message="errors.name" />
                            </div>

                            <div>
                                <InputLabel for="description" value="Description du projet" />
                                <textarea
                                    id="description"
                                    v-model="form.description"
                                    class="mt-1 block w-full bg-zinc-1050 border-zinc-1000 focus:border-primary-600 focus:ring-primary-600 rounded-md shadow-sm"
                                    required>
                                </textarea>
                                <InputError class="mt-2" :message="errors.description" />
                            </div>

                            <div>
                                <InputLabel for="slug" value="Slug" />
                                <TextInput
                                    id="slug"
                                    v-model="form.slug"
                                    type="text"
                                    class="mt-1 block w-full"
                                    required
                                />
                                <InputError class="mt-2" :message="errors.slug" />
                            </div>

                            <div class="w-full flex gap-6">
                                <div class="w-1/2">
                                    <InputLabel for="url" value="Lien du projet" />
                                    <TextInput
                                        id="url"
                                        v-model="form.url"
                                        type="url"
                                        class="mt-1 block w-full"
                                        required
                                    />
                                    <InputError class="mt-2" :message="errors.url" />
                                </div>

                                <div class="w-1/2">
                                    <InputLabel for="github" value="Github" />
                                    <TextInput
                                        id="github"
                                        v-model="form.github"
                                        type="text"
                                        class="mt-1 block w-full"
                                        required
                                    />
                                    <InputError class="mt-2" :message="errors.github" />
                                </div>
                            </div>

                            <div class="w-full flex gap-6">
                                <div class="w-1/2">
                                    <InputLabel for="year" value="Année" />
                                    <TextInput
                                        id="year"
                                        v-model="form.year"
                                        type="number"
                                        class="mt-1 block w-full"
                                        required
                                    />
                                    <InputError class="mt-2" :message="errors.year" />
                                </div>

                                <div class="w-1/2">
                                    <InputLabel for="technologies" value="Technologies" />
                                    <SecondaryButton class="mt-1" @click="showTechnologyModal = !showTechnologyModal">Ajouter une technologie</SecondaryButton>

                                    <DialogModal ref="technologyModal" :show="showTechnologyModal">
                                        <template #title>
                                            <ul class="py-4 flex flex-wrap gap-2">
                                                <li
                                                    class="inline-flex items-center gap-x-0.5 rounded-md bg-zinc-1000 hover:bg-accent-green-darker cursor-pointer transition-colors px-2 py-1 ring-1 ring-inset ring-white/10 text-white text-sm"
                                                    v-for="technology in filteredTechnologies"
                                                    :key="technology.id"
                                                    @click.prevent="technologiesSet.add(technology)">
                                                    {{ technology.name }}
                                                </li>
                                            </ul>
                                        </template>
                                        <template #footer>
                                            <div class="flex flex-wrap gap-2">
                                                <span class="inline-flex gap-1.5 items-center rounded-md bg-zinc-1050 pl-2 pr-1 py-1 text-xs font-medium text-white ring-1 ring-white/10 ring-inset" v-for="(technology, index) in technologiesSet" :key="index">
                                                    {{ technology.name ? technology.name : technology }}
                                                    <X :size="14" class="hover:text-red-500 cursor-pointer" @click.prevent="technologiesSet.delete(technology)"/>
                                                </span>
                                            </div>
                                            <SecondaryButton class="h-fit flex-none ml-auto" @click="showTechnologyModal = false">Fermer</SecondaryButton>
                                        </template>
                                    </DialogModal>

                                    <InputError class="mt-2" :message="errors.technologies" />
                                </div>
                            </div>

                            <div class="w-1/2 pr-6">
                                <InputLabel for="image" value="Image" />
                                <input
                                    id="image"
                                    type="file"
                                    class="mt-1 block w-full"
                                    @input="form.image = $event.target.files[0]"
                                />
                                <InputError class="mt-2" :message="errors.image" />
                            </div>

                            <PrimaryButton type="submit" class="ml-auto w-fit">Modifier le projet</PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
