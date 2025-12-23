<script setup lang="ts">
import PublicLayout from '@/layouts/PublicLayout.vue';
import ProductCard from '@/components/ProductCard.vue';
import EmptyState from '@/components/EmptyState.vue';
import LoadingSpinner from '@/components/LoadingSpinner.vue';
import { Head, Link } from '@inertiajs/vue3';
import { Grid3x3, List } from 'lucide-vue-next';
import { ref } from 'vue';

interface Product {
    id: number;
    name: string;
    slug: string;
    featured_image?: string | null;
    short_description?: string | null;
    price: number;
    stock?: number;
    is_featured?: boolean;
}

interface PaginatedProducts {
    data: Product[];
    links: Array<{ url: string | null; label: string; active: boolean }>;
}

defineProps<{
    products: PaginatedProducts;
}>();

const viewMode = ref<'grid' | 'list'>('grid');
</script>

<template>
    <PublicLayout>
        <Head title="Katalog Produk - unforgettwblestuff" />

        <div class="bg-white py-12 dark:bg-neutral-900">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <!-- Header -->
                <div class="mb-8">
                    <nav class="mb-4 flex items-center gap-2 text-sm text-neutral-600 dark:text-neutral-400">
                        <Link href="/" class="transition-colors hover:text-rose-600 dark:hover:text-rose-400">
                            Beranda
                        </Link>
                        <span>/</span>
                        <span class="text-neutral-900 dark:text-neutral-100">Katalog</span>
                    </nav>
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h1 class="text-3xl font-bold text-neutral-900 dark:text-neutral-100 sm:text-4xl">
                                Katalog Produk
                            </h1>
                            <p class="mt-2 text-neutral-600 dark:text-neutral-400">
                                Temukan aksesori yang sesuai dengan gaya Anda
                            </p>
                        </div>
                        <!-- View Mode Toggle (optional) -->
                        <div class="flex items-center gap-2 rounded-lg border border-neutral-200 bg-neutral-50 p-1 dark:border-neutral-800 dark:bg-neutral-800">
                            <button
                                :class="[
                                    'rounded-md p-2 transition-colors',
                                    viewMode === 'grid'
                                        ? 'bg-white text-rose-600 shadow-sm dark:bg-neutral-700 dark:text-rose-400'
                                        : 'text-neutral-600 hover:text-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-100',
                                ]"
                                @click="viewMode = 'grid'"
                            >
                                <Grid3x3 class="h-5 w-5" />
                            </button>
                            <button
                                :class="[
                                    'rounded-md p-2 transition-colors',
                                    viewMode === 'list'
                                        ? 'bg-white text-rose-600 shadow-sm dark:bg-neutral-700 dark:text-rose-400'
                                        : 'text-neutral-600 hover:text-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-100',
                                ]"
                                @click="viewMode = 'list'"
                            >
                                <List class="h-5 w-5" />
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Products Grid -->
                <div v-if="products.data.length" :class="[
                    'grid gap-6',
                    viewMode === 'grid' ? 'sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4' : 'grid-cols-1',
                ]">
                    <ProductCard
                        v-for="product in products.data"
                        :key="product.id"
                        :product="product"
                        :show-quick-action="true"
                    />
                </div>

                <EmptyState
                    v-else
                    title="Tidak ada produk"
                    description="Belum ada produk yang tersedia saat ini. Silakan kembali lagi nanti."
                />

                <!-- Pagination -->
                <div v-if="products.data.length && products.links.length > 3" class="mt-12 flex flex-wrap items-center justify-center gap-2">
                    <Link
                        v-for="link in products.links"
                        :key="link.label"
                        :href="link.url || '#'"
                        preserve-scroll
                        :class="[
                            'rounded-lg px-4 py-2 text-sm font-medium transition-all',
                            link.active
                                ? 'bg-rose-600 text-white shadow-md'
                                : 'bg-white text-neutral-700 hover:bg-neutral-100 dark:bg-neutral-800 dark:text-neutral-300 dark:hover:bg-neutral-700',
                            !link.url && 'pointer-events-none opacity-50 cursor-not-allowed',
                        ]"
                        v-html="link.label"
                    />
                </div>
            </div>
        </div>
    </PublicLayout>
</template>

