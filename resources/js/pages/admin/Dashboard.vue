<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';

interface Props {
    stats: {
        products: number;
        activeProducts: number;
        users: number;
    };
}

defineProps<Props>();
</script>

<template>
    <AppLayout>
        <Head title="Admin Dashboard" />
        <section class="space-y-6">
            <div>
                <h1 class="text-2xl font-semibold">Admin Dashboard</h1>
                <p class="text-muted-foreground">
                    Ringkasan cepat performa katalog dan pengguna.
                </p>
            </div>

            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <article class="rounded-xl border bg-card p-5 shadow-sm">
                    <p class="text-sm text-muted-foreground">Total Produk</p>
                    <p class="text-3xl font-semibold">{{ stats.products }}</p>
                </article>
                <article class="rounded-xl border bg-card p-5 shadow-sm">
                    <p class="text-sm text-muted-foreground">Produk Aktif</p>
                    <p class="text-3xl font-semibold">{{ stats.activeProducts }}</p>
                </article>
                <article class="rounded-xl border bg-card p-5 shadow-sm">
                    <p class="text-sm text-muted-foreground">User Terdaftar</p>
                    <p class="text-3xl font-semibold">{{ stats.users }}</p>
                </article>
            </div>
        </section>
    </AppLayout>
</template>

