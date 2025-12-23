<script setup lang="ts">
import { ShoppingBag } from 'lucide-vue-next';

interface Props {
    title?: string;
    description?: string;
    icon?: any;
}

withDefaults(defineProps<Props>(), {
    title: 'Tidak ada produk',
    description: 'Belum ada produk yang tersedia saat ini.',
    icon: ShoppingBag,
});
</script>

<template>
    <div class="flex flex-col items-center justify-center rounded-2xl border border-dashed border-neutral-200 bg-neutral-50/50 p-12 text-center dark:border-neutral-800 dark:bg-neutral-900/50">
        <component
            :is="icon"
            class="mb-4 h-16 w-16 text-neutral-400"
        />
        <h3 class="mb-2 text-lg font-semibold text-neutral-900 dark:text-neutral-100">
            {{ title }}
        </h3>
        <p class="max-w-sm text-sm text-neutral-600 dark:text-neutral-400">
            {{ description }}
        </p>
        <slot />
    </div>
</template>

