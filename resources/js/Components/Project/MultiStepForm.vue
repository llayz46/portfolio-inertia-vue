<script setup>
import { Stepper, StepperDescription, StepperItem, StepperSeparator, StepperIndicator, StepperTitle, StepperTrigger } from '@/Components/ui/stepper'
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'
import { AppWindow, Check } from 'lucide-vue-next'
import Laravel from '@/Components/Icons/Laravel.vue'
import InputLabel from "@/Components/Jetstream/InputLabel.vue";
import InputError from "@/Components/Jetstream/InputError.vue";
import TextInput from "@/Components/Jetstream/TextInput.vue";
import PrimaryButton from "@/Components/Jetstream/PrimaryButton.vue";

defineProps({
    technologies: Array,
})

const currentStep = ref(1)

const form = useForm({
    project: {
        name: '',
        description: '',
        image: '',
        slug: '',
        url: '',
        github: '',
        year: '2025'
    },
    technology: {
        name: '',
        icon: ''
    },
    review: {
        grr: ''
    }
})

const steps = [{
    step: 1,
    title: 'Projet',
    description: 'Créer un nouveau projet',
    icon: AppWindow,
}, {
    step: 2,
    title: 'Technologie',
    description: 'Ajouter une/des technologies à votre projet',
    icon: Laravel,
}, {
    step: 3,
    title: 'Confirmer',
    description: 'Confirmer la création',
    icon: Check,
}]
</script>

<template>
    <Stepper class="max-w-4xl mx-auto">
        <StepperItem
            v-for="item in steps"
            :key="item.step"
            class="basis-1/3"
            :step="item.step"
        >
            <StepperTrigger @click="currentStep = item.step">
                <StepperIndicator>
                    <component :is="item.icon" class="size-4" />
                </StepperIndicator>
                <div class="flex flex-col">
                    <StepperTitle>
                        {{ item.title }}
                    </StepperTitle>
                    <StepperDescription>
                        {{ item.description }}
                    </StepperDescription>
                </div>
            </StepperTrigger>
            <StepperSeparator
                v-if="item.step !== steps[steps.length - 1].step"
                class="w-full h-px"
            />
        </StepperItem>
    </Stepper>

    <form class="mt-10">
        <div v-if="currentStep === 1" class="flex flex-col gap-6">
            <div>
                <InputLabel for="name" value="Nom du projet" />
                <TextInput
                    id="name"
                    v-model="form.project.name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                />
                <InputError class="mt-2" :message="form.errors['project.name']" />
            </div>

            <div>
                <InputLabel for="description" value="Description du projet" />
                <textarea
                    id="description"
                    v-model="form.project.description"
                    class="mt-1 block w-full bg-zinc-1050 border-zinc-1000 focus:border-primary-600 focus:ring-primary-600 rounded-md shadow-sm"
                    required>
            </textarea>
                <InputError class="mt-2" :message="form.errors['project.description']" />
            </div>

            <div>
                <InputLabel for="slug" value="Slug" />
                <TextInput
                    id="slug"
                    v-model="form.project.slug"
                    type="text"
                    class="mt-1 block w-full"
                    required
                />
                <InputError class="mt-2" :message="form.errors['project.slug']" />
            </div>

            <div class="w-full flex gap-6">
                <div class="w-1/2">
                    <InputLabel for="url" value="Lien du projet" />
                    <TextInput
                        id="url"
                        v-model="form.project.url"
                        type="url"
                        class="mt-1 block w-full"
                        required
                    />
                    <InputError class="mt-2" :message="form.errors['project.url']" />
                </div>

                <div class="w-1/2">
                    <InputLabel for="github" value="Github" />
                    <TextInput
                        id="github"
                        v-model="form.project.github"
                        type="text"
                        class="mt-1 block w-full"
                        required
                    />
                    <InputError class="mt-2" :message="form.errors['project.github']" />
                </div>
            </div>

            <div>
                <InputLabel for="year" value="Slug" />
                <TextInput
                    id="year"
                    v-model="form.project.year"
                    type="number"
                    class="mt-1 block w-full"
                    required
                />
                <InputError class="mt-2" :message="form.errors['project.year']" />
            </div>

            <PrimaryButton class="ml-auto w-fit">Suivant</PrimaryButton>
        </div>

        <div v-if="currentStep === 2" class="flex flex-col gap-6">
            {{ technologies }}
        </div>

        <div v-if="currentStep === 3" class="flex flex-col gap-6">
            {{ form }}
        </div>
    </form>
</template>
