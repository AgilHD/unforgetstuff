<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import type { PageProps } from '@inertiajs/core';
import { Head, Link, router } from '@inertiajs/vue3';

interface Product {
    id: number;
    name: string;
    slug: string;
    price: number;
    stock: number;
    is_active: boolean;
    created_at: string;
}

interface PaginatedProducts {
    data: Product[];
    links: Array<{ url: string | null; label: string; active: boolean }>;
}

defineProps<{
    products: PaginatedProducts;
}>();

const handleDelete = (product: Product) => {
    if (!confirm(`Hapus produk "${product.name}"?`)) return;

    router.delete(`/admin/products/${product.id}`);
};
</script>

<template>
    <AppLayout>
        <Head title="Kelola Produk" />

        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-semibold">Produk</h1>
                <p class="text-muted-foreground">
                    CRUD katalog. Hanya admin dengan login terverifikasi.
                </p>
            </div>
            <Link
                href="/admin/products/create"
                class="rounded-lg bg-primary px-4 py-2 text-sm font-semibold text-primary-foreground shadow hover:opacity-90"
            >
                Tambah Produk
            </Link>
        </div>

        <div class="mt-6 overflow-hidden rounded-xl border bg-card">
            <table class="min-w-full divide-y divide-border">
                <thead class="bg-muted/50">
                    <tr class="text-left text-sm">
                        <th class="px-4 py-3 font-medium">Nama</th>
                        <th class="px-4 py-3 font-medium">Harga</th>
                        <th class="px-4 py-3 font-medium">Stok</th>
                        <th class="px-4 py-3 font-medium">Status</th>
                        <th class="px-4 py-3 font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border text-sm">
                    <tr v-for="product in products.data" :key="product.id" class="hover:bg-muted/30">
                        <td class="px-4 py-3 font-medium">
                            <div class="flex flex-col">
                                <span>{{ product.name }}</span>
                                <span class="text-xs text-muted-foreground">/{{ product.slug }}</span>
                            </div>
                        </td>
                        <td class="px-4 py-3">Rp{{ product.price.toLocaleString('id-ID') }}</td>
                        <td class="px-4 py-3">{{ product.stock }}</td>
                        <td class="px-4 py-3">
                            <span
                                :class="[
                                    'rounded-full px-2 py-1 text-xs font-semibold',
                                    product.is_active
                                        ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-200'
                                        : 'bg-rose-100 text-rose-700 dark:bg-rose-900/40 dark:text-rose-200',
                                ]"
                            >
                                {{ product.is_active ? 'Aktif' : 'Draft' }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex gap-2">
                                <Link
                                    :href="`/admin/products/${product.id}/edit`"
                                    class="text-primary hover:underline"
                                >
                                    Edit
                                </Link>
                                <button class="text-rose-500 hover:underline" @click="handleDelete(product)">
                                    Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-4 flex flex-wrap items-center gap-2">
            <Link
                v-for="link in products.links"
                :key="link.label"
                :href="link.url || '#'"
                preserve-scroll
                :class="[
                    'rounded-lg px-3 py-2 text-sm',
                    link.active ? 'bg-primary text-primary-foreground' : 'text-muted-foreground hover:bg-muted/60',
                    !link.url && 'pointer-events-none opacity-50',
                ]"
                v-html="link.label"
            />
        </div>
    </AppLayout>
</template>

