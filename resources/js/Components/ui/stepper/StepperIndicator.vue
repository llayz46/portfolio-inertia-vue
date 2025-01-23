<script setup>
import { cn } from '@/lib/utils';
import { StepperIndicator, useForwardProps } from 'radix-vue';

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

const forwarded = useForwardProps(delegatedProps);
</script>

<template>
  <StepperIndicator
    v-bind="forwarded"
    :class="
      cn(
        'inline-flex items-center justify-center rounded-full text-white/50 w-10 h-10',
        // Disabled
        'group-data-[disabled]:text-white/35',
        // Active
        'group-data-[state=active]:bg-primary-600 group-data-[state=active]:text-white',
        // Completed
        'group-data-[state=completed]:bg-zinc-1000 group-data-[state=completed]:text-white/70',
        props.class,
      )
    "
  >
    <slot />
  </StepperIndicator>
</template>
