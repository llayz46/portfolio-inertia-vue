<script setup>
import {cn} from '@/lib/utils.ts';
import {AccordionContent} from 'radix-vue';
import {computed} from 'vue';

const props = defineProps({
    forceMount: {type: Boolean, required: false},
    asChild: {type: Boolean, required: false},
    as: {type: null, required: false},
    class: {type: null, required: false},
});

const delegatedProps = computed(() => {
    const {class: _, ...delegated} = props;

    return delegated;
});
</script>

<template>
    <AccordionContent
        v-bind="delegatedProps"
        class="overflow-hidden text-sm transition-all data-[state=closed]:animate-accordion-up data-[state=open]:animate-accordion-down"
    >
        <div :class="cn('font-dm-sans text-gray-400', props.class)">
            <slot/>
        </div>
    </AccordionContent>
</template>
