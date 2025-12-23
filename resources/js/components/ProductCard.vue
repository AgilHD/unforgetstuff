<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { Badge } from '@/components/ui/badge';
import { Heart, ShoppingBag } from 'lucide-vue-next';
import { computed } from 'vue';

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

interface Props {
    product: Product;
    showQuickAction?: boolean;
}

const props = withDefaults(defineProps<Props>(), {
    showQuickAction: false,
});

const isInStock = computed(() => !props.product.stock || props.product.stock > 0);
const formattedPrice = computed(() => 
    new Intl.NumberFormat('id-ID', { 
        style: 'currency', 
        currency: 'IDR',
        minimumFractionDigits: 0 
    }).format(props.product.price)
);
</script>

<template>
    <article
        class="group relative flex flex-col overflow-hidden rounded-2xl border border-neutral-200 bg-white shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-xl dark:border-neutral-800 dark:bg-neutral-900"
    >
        <!-- Image Container -->
        <Link :href="`/catalog/${product.slug}`" class="relative block aspect-square overflow-hidden bg-neutral-100 dark:bg-neutral-800">
            <img
                v-if="product.featured_image"
                :src="product.featured_image"
                :alt="product.name"
                class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110"
                loading="lazy"
            />
            <div
                v-else
                class="flex h-full items-center justify-center text-sm text-neutral-400"
            >
                <div class="text-center">
                    <ShoppingBag class="mx-auto mb-2 h-12 w-12 opacity-20" />
                    <p>Foto produk</p>
                </div>
            </div>

            <!-- Badge Overlay -->
            <div class="absolute left-3 top-3 flex flex-col gap-2">
                <Badge
                    v-if="product.is_featured"
                    variant="default"
                    class="bg-rose-500 text-white shadow-md"
                >
                    Unggulan
                </Badge>
                <Badge
                    v-if="!isInStock"
                    variant="destructive"
                    class="shadow-md"
                >
                    Habis
                </Badge>
            </div>

            <!-- Quick Action Overlay (on hover) -->
            <div
                v-if="showQuickAction && isInStock"
                class="absolute inset-0 flex items-center justify-center bg-black/40 opacity-0 transition-opacity duration-300 group-hover:opacity-100"
            >
                <a
                    :href="`https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20membeli%20${encodeURIComponent(product.name)}`"
                    target="_blank"
                    rel="noreferrer"
                    class="rounded-full bg-white px-6 py-3 text-sm font-semibold text-neutral-900 shadow-lg transition-transform hover:scale-105"
                    @click.stop
                >
                    Beli Sekarang
                </a>
            </div>
        </Link>

        <!-- Content -->
        <div class="flex flex-1 flex-col p-5">
            <Link :href="`/catalog/${product.slug}`" class="flex-1">
                <h3 class="mb-2 line-clamp-2 text-lg font-semibold text-neutral-900 transition-colors group-hover:text-rose-600 dark:text-neutral-100">
                    {{ product.name }}
                </h3>
                <p
                    v-if="product.short_description"
                    class="mb-4 line-clamp-2 text-sm text-neutral-600 dark:text-neutral-400"
                >
                    {{ product.short_description }}
                </p>
            </Link>

            <!-- Price & Action -->
            <div class="mt-auto flex items-center justify-between gap-3">
                <div>
                    <p class="text-xl font-bold text-neutral-900 dark:text-neutral-100">
                        {{ formattedPrice }}
                    </p>
                    <p
                        v-if="product.stock !== undefined"
                        class="text-xs text-neutral-500"
                    >
                        Stok: {{ product.stock }}
                    </p>
                </div>
                <button
                    v-if="isInStock"
                    class="rounded-full bg-rose-500 p-3 text-white shadow-md transition-all hover:bg-rose-600 hover:shadow-lg active:scale-95"
                    :aria-label="`Beli ${product.name}`"
                    @click.stop
                >
                    <ShoppingBag class="h-5 w-5" />
                </button>
            </div>
        </div>
    </article>
</template>

