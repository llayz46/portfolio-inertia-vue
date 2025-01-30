<script setup>
import { cn } from '@/lib/utils.ts';
import { Plus } from 'lucide-vue-next';
import { AccordionHeader, AccordionTrigger } from 'radix-vue';
import { computed } from 'vue';

const props = defineProps({
  asChild: { type: Boolean, required: false },
  as: { type: null, required: false },
  class: { type: null, required: false },
});

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});
</script>

<template>
  <AccordionHeader>
    <AccordionTrigger
      v-bind="delegatedProps"
      :class="cn('[&[data-state=open]>svg]:rotate-45 max-[400px]:pl-3 relative', props.class)"
    >
      <slot />
      <Plus class="max-[400px]:absolute top-2 right-2 transition-all flex-none" size="16" />
    </AccordionTrigger>
  </AccordionHeader>
</template>
