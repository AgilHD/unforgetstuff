<script setup lang="ts">
import PublicLayout from '@/layouts/PublicLayout.vue';
import ProductCard from '@/components/ProductCard.vue';
import EmptyState from '@/components/EmptyState.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ArrowRight, Sparkles, Package, Heart, MessageCircle } from 'lucide-vue-next';

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

defineProps<{
    featuredProducts: Product[];
}>();
</script>

<template>
    <PublicLayout>
        <Head title="unforgettwblestuff - Aksesori Timeless yang Diingat" />

        <!-- Hero Section -->
        <section class="relative overflow-hidden bg-gradient-to-br from-rose-50 via-pink-50 to-rose-100 py-20 dark:from-neutral-900 dark:via-neutral-900 dark:to-neutral-800 sm:py-28">
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute -right-20 -top-20 h-96 w-96 rounded-full bg-rose-200/30 blur-3xl dark:bg-rose-900/20" />
                <div class="absolute -bottom-20 -left-20 h-96 w-96 rounded-full bg-pink-200/30 blur-3xl dark:bg-pink-900/20" />
            </div>

            <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-3xl text-center">
                    <div class="mb-6 inline-flex items-center gap-2 rounded-full bg-white/80 px-4 py-2 text-xs font-semibold uppercase tracking-wider text-rose-600 shadow-sm backdrop-blur-sm dark:bg-neutral-800/80 dark:text-rose-400">
                        <Sparkles class="h-4 w-4" />
                        Aksesori yang bikin kamu diingat
                    </div>
                    <h1 class="mb-6 text-4xl font-bold leading-tight text-neutral-900 dark:text-neutral-100 sm:text-5xl lg:text-6xl">
                        Toko aksesori
                        <span class="bg-gradient-to-r from-rose-600 to-pink-600 bg-clip-text text-transparent">
                            timeless
                        </span>
                        , siap jadi hadiah berkesan
                    </h1>
                    <p class="mb-8 text-lg text-neutral-600 dark:text-neutral-400 sm:text-xl">
                        Kurasi gelang, kalung, dan aksesori manis yang mudah dipadu-padankan. 
                        Lihat detail produk, pilih favoritmu, lalu lanjutkan ke chat.
                    </p>
                    <div class="flex flex-col items-center justify-center gap-4 sm:flex-row">
                        <Link
                            href="#catalog"
                            class="inline-flex items-center gap-2 rounded-full bg-rose-600 px-8 py-4 text-base font-semibold text-white shadow-lg transition-all hover:bg-rose-700 hover:shadow-xl hover:scale-105 active:scale-95"
                        >
                            Lihat Katalog
                            <ArrowRight class="h-5 w-5" />
                        </Link>
                        <a
                            href="https://wa.me/6281234567890"
                            target="_blank"
                            rel="noreferrer"
                            class="inline-flex items-center gap-2 rounded-full border-2 border-neutral-300 bg-white px-8 py-4 text-base font-semibold text-neutral-900 transition-all hover:border-rose-300 hover:bg-rose-50 hover:scale-105 active:scale-95 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-100 dark:hover:border-rose-700 dark:hover:bg-neutral-700"
                        >
                            <MessageCircle class="h-5 w-5" />
                            Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="border-b border-neutral-200 bg-white py-16 dark:border-neutral-800 dark:bg-neutral-900">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="text-center">
                        <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-rose-100 text-rose-600 dark:bg-rose-900/30 dark:text-rose-400">
                            <Package class="h-7 w-7" />
                        </div>
                        <h3 class="mb-2 font-semibold text-neutral-900 dark:text-neutral-100">
                            Koleksi Terkurasi
                        </h3>
                        <p class="text-sm text-neutral-600 dark:text-neutral-400">
                            Setiap produk dipilih dengan teliti untuk kualitas terbaik
                        </p>
                    </div>
                    <div class="text-center">
                        <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-rose-100 text-rose-600 dark:bg-rose-900/30 dark:text-rose-400">
                            <Heart class="h-7 w-7" />
                        </div>
                        <h3 class="mb-2 font-semibold text-neutral-900 dark:text-neutral-100">
                            Siap Dikemas
                        </h3>
                        <p class="text-sm text-neutral-600 dark:text-neutral-400">
                            Bisa request bungkus kado dan kartu ucapan
                        </p>
                    </div>
                    <div class="text-center">
                        <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-rose-100 text-rose-600 dark:bg-rose-900/30 dark:text-rose-400">
                            <MessageCircle class="h-7 w-7" />
                        </div>
                        <h3 class="mb-2 font-semibold text-neutral-900 dark:text-neutral-100">
                            Respons Cepat
                        </h3>
                        <p class="text-sm text-neutral-600 dark:text-neutral-400">
                            Tim kami siap membantu via WhatsApp
                        </p>
                    </div>
                    <div class="text-center">
                        <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-rose-100 text-rose-600 dark:bg-rose-900/30 dark:text-rose-400">
                            <Sparkles class="h-7 w-7" />
                        </div>
                        <h3 class="mb-2 font-semibold text-neutral-900 dark:text-neutral-100">
                            Foto Asli
                        </h3>
                        <p class="text-sm text-neutral-600 dark:text-neutral-400">
                            Detail bahan dan ukuran jelas terlihat
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Products Section -->
        <section id="catalog" class="bg-neutral-50 py-20 dark:bg-neutral-950">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mb-12 text-center">
                    <h2 class="mb-4 text-3xl font-bold text-neutral-900 dark:text-neutral-100 sm:text-4xl">
                        Koleksi Unggulan
                    </h2>
                    <p class="mx-auto max-w-2xl text-lg text-neutral-600 dark:text-neutral-400">
                        Pilih produk yang paling cocok jadi hadiah atau teman gaya sehari-hari
                    </p>
                </div>

                <div v-if="featuredProducts.length" class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    <ProductCard
                        v-for="product in featuredProducts"
                        :key="product.id"
                        :product="product"
                        :show-quick-action="true"
                    />
                </div>

                <EmptyState
                    v-else
                    title="Belum ada produk"
                    description="Koleksi produk akan segera hadir. Stay tuned!"
                />

                <div v-if="featuredProducts.length" class="mt-12 text-center">
                    <Link
                        href="/catalog"
                        class="inline-flex items-center gap-2 rounded-full border-2 border-neutral-300 bg-white px-8 py-4 text-base font-semibold text-neutral-900 transition-all hover:border-rose-500 hover:bg-rose-50 hover:text-rose-600 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-100 dark:hover:border-rose-500 dark:hover:bg-neutral-700"
                    >
                        Lihat Semua Produk
                        <ArrowRight class="h-5 w-5" />
                    </Link>
                </div>
            </div>
        </section>

        <!-- How It Works Section -->
        <section class="bg-white py-20 dark:bg-neutral-900">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mb-12 text-center">
                    <h2 class="mb-4 text-3xl font-bold text-neutral-900 dark:text-neutral-100 sm:text-4xl">
                        Cara Berbelanja
                    </h2>
                    <p class="mx-auto max-w-2xl text-lg text-neutral-600 dark:text-neutral-400">
                        Proses belanja yang mudah dan cepat
                    </p>
                </div>

                <div class="grid gap-8 sm:grid-cols-3">
                    <div class="relative text-center">
                        <div class="absolute left-1/2 top-0 -z-10 hidden h-full w-px translate-x-1/2 bg-neutral-200 sm:block dark:bg-neutral-800" />
                        <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-full bg-rose-100 text-2xl font-bold text-rose-600 dark:bg-rose-900/30 dark:text-rose-400">
                            1
                        </div>
                        <h3 class="mb-3 text-xl font-semibold text-neutral-900 dark:text-neutral-100">
                            Pilih Produk
                        </h3>
                        <p class="text-neutral-600 dark:text-neutral-400">
                            Jelajahi katalog dan temukan aksesori yang paling cocok dengan gaya atau momen spesialmu.
                        </p>
                    </div>
                    <div class="relative text-center">
                        <div class="absolute left-1/2 top-0 -z-10 hidden h-full w-px translate-x-1/2 bg-neutral-200 sm:block dark:bg-neutral-800" />
                        <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-full bg-rose-100 text-2xl font-bold text-rose-600 dark:bg-rose-900/30 dark:text-rose-400">
                            2
                        </div>
                        <h3 class="mb-3 text-xl font-semibold text-neutral-900 dark:text-neutral-100">
                            Lihat Detail
                        </h3>
                        <p class="text-neutral-600 dark:text-neutral-400">
                            Baca deskripsi, bahan, dan lihat foto produk agar kamu yakin dengan pilihanmu.
                        </p>
                    </div>
                    <div class="relative text-center">
                        <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-full bg-rose-100 text-2xl font-bold text-rose-600 dark:bg-rose-900/30 dark:text-rose-400">
                            3
                        </div>
                        <h3 class="mb-3 text-xl font-semibold text-neutral-900 dark:text-neutral-100">
                            Checkout via Chat
                        </h3>
                        <p class="text-neutral-600 dark:text-neutral-400">
                            Kirim pesan ke WhatsApp kami untuk memesan, konsultasi, atau request bungkus kado.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </PublicLayout>
</template>

