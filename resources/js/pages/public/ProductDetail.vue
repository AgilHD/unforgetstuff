<script setup lang="ts">
import PublicLayout from '@/layouts/PublicLayout.vue';
import { Badge } from '@/components/ui/badge';
import { Head, Link } from '@inertiajs/vue3';
import { ShoppingBag, MessageCircle, Heart, Check, Package, Truck, Shield } from 'lucide-vue-next';
import { computed } from 'vue';

interface Product {
    id: number;
    name: string;
    slug: string;
    featured_image?: string | null;
    short_description?: string | null;
    description?: string | null;
    price: number;
    stock: number;
    metadata?: Record<string, string>;
}

const props = defineProps<{
    product: Product;
}>();

const isInStock = computed(() => props.product.stock > 0);
const formattedPrice = computed(() => 
    new Intl.NumberFormat('id-ID', { 
        style: 'currency', 
        currency: 'IDR',
        minimumFractionDigits: 0 
    }).format(props.product.price)
);

const whatsappMessage = computed(() => 
    `Halo, saya ingin membeli ${encodeURIComponent(props.product.name)}`
);
</script>

<template>
    <PublicLayout>
        <Head :title="`${product.name} - unforgettwblestuff`" />

        <div class="bg-neutral-50 py-8 dark:bg-neutral-950">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <!-- Breadcrumb -->
                <nav class="mb-8 flex items-center gap-2 text-sm text-neutral-600 dark:text-neutral-400">
                    <Link href="/" class="transition-colors hover:text-rose-600 dark:hover:text-rose-400">
                        Beranda
                    </Link>
                    <span>/</span>
                    <Link href="/catalog" class="transition-colors hover:text-rose-600 dark:hover:text-rose-400">
                        Katalog
                    </Link>
                    <span>/</span>
                    <span class="text-neutral-900 dark:text-neutral-100">{{ product.name }}</span>
                </nav>

                <div class="grid gap-12 lg:grid-cols-2">
                    <!-- Product Image -->
                    <div class="space-y-4">
                        <div class="relative overflow-hidden rounded-2xl border border-neutral-200 bg-white shadow-lg dark:border-neutral-800 dark:bg-neutral-900">
                            <div class="aspect-square bg-neutral-100 dark:bg-neutral-800">
                                <img
                                    v-if="product.featured_image"
                                    :src="product.featured_image"
                                    :alt="product.name"
                                    class="h-full w-full object-cover"
                                />
                                <div
                                    v-else
                                    class="flex h-full items-center justify-center text-neutral-400"
                                >
                                    <div class="text-center">
                                        <Package class="mx-auto mb-2 h-16 w-16 opacity-20" />
                                        <p>Foto produk</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Info -->
                    <div class="space-y-6">
                        <!-- Title & Price -->
                        <div>
                            <h1 class="mb-4 text-3xl font-bold text-neutral-900 dark:text-neutral-100 sm:text-4xl">
                                {{ product.name }}
                            </h1>
                            <div class="mb-4 flex items-baseline gap-3">
                                <p class="text-3xl font-bold text-neutral-900 dark:text-neutral-100">
                                    {{ formattedPrice }}
                                </p>
                            </div>
                            <div class="flex items-center gap-3">
                                <Badge
                                    :variant="isInStock ? 'default' : 'destructive'"
                                    :class="isInStock ? 'bg-emerald-500 text-white' : ''"
                                >
                                    {{ isInStock ? `Stok: ${product.stock} tersedia` : 'Stok habis' }}
                                </Badge>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-800 dark:bg-neutral-900">
                            <h2 class="mb-3 text-lg font-semibold text-neutral-900 dark:text-neutral-100">
                                Deskripsi Produk
                            </h2>
                            <p class="leading-relaxed text-neutral-600 dark:text-neutral-400">
                                {{ product.description || product.short_description || 'Detail produk akan segera diperbarui.' }}
                            </p>
                        </div>

                        <!-- Metadata -->
                        <div
                            v-if="product.metadata && Object.keys(product.metadata).length > 0"
                            class="rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-800 dark:bg-neutral-900"
                        >
                            <h2 class="mb-4 text-lg font-semibold text-neutral-900 dark:text-neutral-100">
                                Detail Produk
                            </h2>
                            <dl class="grid gap-3 sm:grid-cols-2">
                                <div
                                    v-for="(value, key) in product.metadata"
                                    :key="key"
                                    class="flex flex-col gap-1"
                                >
                                    <dt class="text-sm font-medium text-neutral-500 dark:text-neutral-400 capitalize">
                                        {{ key }}
                                    </dt>
                                    <dd class="text-sm font-semibold text-neutral-900 dark:text-neutral-100">
                                        {{ value }}
                                    </dd>
                                </div>
                            </dl>
                        </div>

                        <!-- CTA Buttons -->
                        <div class="space-y-3">
                            <a
                                :href="`https://wa.me/6281234567890?text=${encodeURIComponent(whatsappMessage)}`"
                                target="_blank"
                                rel="noreferrer"
                                :class="[
                                    'flex w-full items-center justify-center gap-3 rounded-xl px-6 py-4 text-base font-semibold text-white shadow-lg transition-all',
                                    isInStock
                                        ? 'bg-rose-600 hover:bg-rose-700 hover:shadow-xl hover:scale-105 active:scale-95'
                                        : 'cursor-not-allowed bg-neutral-400 opacity-50',
                                ]"
                            >
                                <MessageCircle class="h-5 w-5" />
                                {{ isInStock ? 'Beli via WhatsApp' : 'Stok Habis' }}
                            </a>
                            <button
                                class="flex w-full items-center justify-center gap-3 rounded-xl border-2 border-neutral-300 bg-white px-6 py-4 text-base font-semibold text-neutral-900 transition-all hover:border-rose-300 hover:bg-rose-50 hover:text-rose-600 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-100 dark:hover:border-rose-700 dark:hover:bg-neutral-700"
                            >
                                <Heart class="h-5 w-5" />
                                Tambah ke Wishlist
                            </button>
                        </div>

                        <!-- Trust Badges -->
                        <div class="rounded-xl border border-neutral-200 bg-neutral-50 p-6 dark:border-neutral-800 dark:bg-neutral-900">
                            <div class="grid gap-4 sm:grid-cols-3">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-100 text-emerald-600 dark:bg-emerald-900/30 dark:text-emerald-400">
                                        <Check class="h-5 w-5" />
                                    </div>
                                    <div>
                                        <p class="text-xs font-semibold text-neutral-900 dark:text-neutral-100">
                                            Original
                                        </p>
                                        <p class="text-xs text-neutral-600 dark:text-neutral-400">
                                            Produk asli
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">
                                        <Truck class="h-5 w-5" />
                                    </div>
                                    <div>
                                        <p class="text-xs font-semibold text-neutral-900 dark:text-neutral-100">
                                            Pengiriman
                                        </p>
                                        <p class="text-xs text-neutral-600 dark:text-neutral-400">
                                            Cepat & aman
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-amber-100 text-amber-600 dark:bg-amber-900/30 dark:text-amber-400">
                                        <Shield class="h-5 w-5" />
                                    </div>
                                    <div>
                                        <p class="text-xs font-semibold text-neutral-900 dark:text-neutral-100">
                                            Garansi
                                        </p>
                                        <p class="text-xs text-neutral-600 dark:text-neutral-400">
                                            Kualitas terjamin
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </PublicLayout>
</template>

