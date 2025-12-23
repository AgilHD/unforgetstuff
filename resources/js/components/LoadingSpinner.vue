<script setup lang="ts">
interface Props {
    size?: 'sm' | 'md' | 'lg';
    text?: string;
}

const props = withDefaults(defineProps<Props>(), {
    size: 'md',
    text: '',
});

const sizeClasses = {
    sm: 'h-4 w-4',
    md: 'h-8 w-8',
    lg: 'h-12 w-12',
};
</script>

<template>
    <div class="flex flex-col items-center justify-center gap-3">
        <div
            :class="[
                'animate-spin rounded-full border-2 border-neutral-200 border-t-rose-500',
                sizeClasses[size],
            ]"
        />
        <p
            v-if="text"
            class="text-sm text-neutral-600 dark:text-neutral-400"
        >
            {{ text }}
        </p>
    </div>
</template>

