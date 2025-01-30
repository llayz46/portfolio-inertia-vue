<script setup>
defineProps({
    technology: Object
})
</script>

<template>
    <li class="pointer-events-none flex items-center whitespace-nowrap gap-2 border border-[#24292F] py-1 md:py-1.5 px-2 md:px-3 rounded-full">
        <img :src="technology.icon" class="size-3.5" :alt="`Icon de : ${technology.name}`">
        {{ technology.name }}
    </li>
</template>
