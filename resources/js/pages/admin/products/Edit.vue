<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

interface Product {
    id: number;
    name: string;
    slug: string;
    sku: string | null;
    price: number;
    stock: number;
    is_active: boolean;
    featured_image?: string | null;
    short_description?: string | null;
    description?: string | null;
}

const props = defineProps<{
    product: Product;
}>();

const form = useForm({
    name: props.product.name,
    slug: props.product.slug,
    sku: props.product.sku ?? '',
    price: props.product.price,
    stock: props.product.stock,
    is_active: props.product.is_active,
    featured_image: props.product.featured_image ?? '',
    short_description: props.product.short_description ?? '',
    description: props.product.description ?? '',
});

const submit = () => {
    form.put(`/admin/products/${props.product.id}`, {
        preserveScroll: true,
    });
};
</script>

<template>
    <AppLayout>
        <Head :title="`Edit ${product.name}`" />

        <div class="mb-6">
            <h1 class="text-2xl font-semibold">Edit Produk</h1>
            <p class="text-muted-foreground">Perbarui detail produk.</p>
        </div>

        <form class="space-y-4" @submit.prevent="submit">
            <div class="grid gap-4 md:grid-cols-2">
                <label class="flex flex-col gap-1 text-sm font-medium">
                    Nama
                    <input v-model="form.name" type="text" class="rounded-lg border px-3 py-2" />
                    <span v-if="form.errors.name" class="text-xs text-rose-500">{{ form.errors.name }}</span>
                </label>
                <label class="flex flex-col gap-1 text-sm font-medium">
                    Slug
                    <input v-model="form.slug" type="text" class="rounded-lg border px-3 py-2" />
                    <span v-if="form.errors.slug" class="text-xs text-rose-500">{{ form.errors.slug }}</span>
                </label>
            </div>

            <div class="grid gap-4 md:grid-cols-2">
                <label class="flex flex-col gap-1 text-sm font-medium">
                    SKU
                    <input v-model="form.sku" type="text" class="rounded-lg border px-3 py-2" />
                    <span v-if="form.errors.sku" class="text-xs text-rose-500">{{ form.errors.sku }}</span>
                </label>
                <label class="flex flex-col gap-1 text-sm font-medium">
                    Harga
                    <input v-model.number="form.price" type="number" min="0" step="0.01" class="rounded-lg border px-3 py-2" />
                    <span v-if="form.errors.price" class="text-xs text-rose-500">{{ form.errors.price }}</span>
                </label>
            </div>

            <div class="grid gap-4 md:grid-cols-2">
                <label class="flex flex-col gap-1 text-sm font-medium">
                    Stok
                    <input v-model.number="form.stock" type="number" min="0" class="rounded-lg border px-3 py-2" />
                    <span v-if="form.errors.stock" class="text-xs text-rose-500">{{ form.errors.stock }}</span>
                </label>
                <label class="flex items-center gap-2 text-sm font-medium">
                    <input v-model="form.is_active" type="checkbox" class="h-4 w-4" />
                    Produk aktif
                </label>
            </div>

            <label class="flex flex-col gap-1 text-sm font-medium">
                URL Gambar unggulan
                <input v-model="form.featured_image" type="url" class="rounded-lg border px-3 py-2" />
                <span v-if="form.errors.featured_image" class="text-xs text-rose-500">{{ form.errors.featured_image }}</span>
            </label>

            <label class="flex flex-col gap-1 text-sm font-medium">
                Deskripsi singkat
                <input v-model="form.short_description" type="text" class="rounded-lg border px-3 py-2" />
                <span v-if="form.errors.short_description" class="text-xs text-rose-500">{{
                    form.errors.short_description
                }}</span>
            </label>

            <label class="flex flex-col gap-1 text-sm font-medium">
                Deskripsi lengkap
                <textarea v-model="form.description" rows="5" class="rounded-lg border px-3 py-2" />
                <span v-if="form.errors.description" class="text-xs text-rose-500">{{ form.errors.description }}</span>
            </label>

            <div class="flex items-center gap-3">
                <button
                    type="submit"
                    class="rounded-lg bg-primary px-4 py-2 text-sm font-semibold text-primary-foreground shadow hover:opacity-90 disabled:opacity-50"
                    :disabled="form.processing"
                >
                    Simpan perubahan
                </button>
                <span v-if="form.recentlySuccessful" class="text-sm text-emerald-600">Tersimpan</span>
            </div>
        </form>
    </AppLayout>
</template>

