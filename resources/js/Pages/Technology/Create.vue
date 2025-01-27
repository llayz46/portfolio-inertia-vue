<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from "@inertiajs/vue3";
import InputLabel from "@/Components/Jetstream/InputLabel.vue";
import TextInput from "@/Components/Jetstream/TextInput.vue";
import InputError from "@/Components/Jetstream/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    technologies: Array,
    errors: Object
});

const form = useForm({
    name: '',
    icon: ''
})

const submit = () => {
    form.post(route('technologies.store'), {
        preserveState: true,
        onSuccess: () => {
            form.reset()
        },
    })
}
</script>

<template>
    <AppLayout title="Créer une technologie">
        <template #header>
            <h2 class="font-semibold text-xl text-white leading-tight">
                Ajouter une technologie
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-zinc-1050 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                    <form @submit.prevent="submit">
                        <div class="flex flex-col gap-6">
                            <div>
                                <InputLabel for="name" value="Nom de la technologie" />
                                <TextInput
                                    id="name"
                                    v-model="form.name"
                                    type="text"
                                    class="mt-1 block w-full"
                                    required
                                />
                                <InputError class="mt-2" :message="errors.name" />
                            </div>

                            <div>
                                <InputLabel for="icon" value="Icon de la technologie" />
                                <TextInput
                                    id="icon"
                                    v-model="form.icon"
                                    type="text"
                                    class="mt-1 block w-full"
                                    required
                                />
                                <InputError class="mt-2" :message="errors.icon" />
                            </div>

                            <PrimaryButton type="submit" class="ml-auto w-fit">Créer la technologie</PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
