<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
];
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div
            class="flex h-full flex-1 flex-col gap-6 overflow-x-auto rounded-xl p-6"
        >
            <!-- Hero / intro toko -->
            <section
                class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-pink-500 via-rose-500 to-pink-400 px-6 py-8 text-white shadow-lg md:px-10 md:py-10"
            >
                <div class="absolute inset-0 opacity-40 mix-blend-screen">
                    <div
                        class="pointer-events-none absolute -left-10 top-0 h-40 w-40 rounded-full bg-pink-300 blur-3xl"
                    />
                    <div
                        class="pointer-events-none absolute bottom-0 right-0 h-56 w-56 rounded-full bg-fuchsia-400 blur-3xl"
                    />
                </div>

                <div class="relative grid gap-8 md:grid-cols-[1.4fr_1fr]">
                    <div class="space-y-4">
                        <p
                            class="inline-flex items-center gap-2 rounded-full bg-white/15 px-3 py-1 text-xs font-medium tracking-wide uppercase"
                        >
                            unforgettwblestuff • Admin Dashboard
                        </p>
                        <h1
                            class="text-3xl font-semibold leading-tight md:text-4xl"
                        >
                            Kelola toko aksesori kamu dengan
                            <span class="font-bold">lebih rapi & cantik</span>.
                        </h1>
                        <p class="max-w-xl text-sm md:text-base text-pink-50/95">
                            Dari sini kamu bisa mengatur katalog produk, kategori,
                            dan memantau etalase unforgettwblestuff yang dilihat
                            pengunjung. Semua dibuat simple, dengan nuansa
                            <span class="font-semibold">pink yang manis</span>.
                        </p>

                        <div class="flex flex-wrap gap-3 pt-2">
                            <Link
                                href="/catalog"
                                class="inline-flex items-center gap-2 rounded-xl bg-white px-4 py-2.5 text-sm font-semibold text-pink-700 shadow-sm transition hover:bg-pink-50 hover:shadow-md"
                            >
                                Lihat katalog produk
                                <span aria-hidden="true">→</span>
                            </Link>
                            <Link
                                href="/"
                                class="inline-flex items-center gap-2 rounded-xl border border-white/50 bg-white/10 px-4 py-2.5 text-sm font-medium text-pink-50 backdrop-blur-sm transition hover:bg-white/20"
                            >
                                Buka tampilan publik
                            </Link>
                        </div>
                    </div>

                    <div
                        class="grid gap-3 text-xs md:text-sm text-pink-50/95 sm:grid-cols-2 md:grid-cols-1"
                    >
                        <div
                            class="rounded-2xl bg-white/10 p-4 shadow-sm backdrop-blur-sm"
                        >
                            <p class="text-[11px] font-medium uppercase tracking-wide">
                                Ringkasan toko
                            </p>
                            <p class="mt-2 text-sm font-semibold">
                                Toko siap menyambut pengunjung 💕
                            </p>
                            <p class="mt-1 text-xs text-pink-50/80">
                                Pastikan katalog selalu up-to-date agar pelanggan
                                mudah menemukan hadiah favorit mereka.
                            </p>
                        </div>
                        <div
                            class="rounded-2xl bg-white/10 p-4 shadow-sm backdrop-blur-sm"
                        >
                            <p class="text-[11px] font-medium uppercase tracking-wide">
                                Tips cepat
                            </p>
                            <ul class="mt-2 space-y-1.5 text-xs">
                                <li>• Tambahkan foto produk yang jelas.</li>
                                <li>• Tulis deskripsi singkat & manis.</li>
                                <li>• Tandai produk favorit sebagai unggulan.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Kartu-kartu katalog & manajemen -->
            <section class="space-y-4">
                <div class="flex items-center justify-between gap-2">
                    <h2 class="text-lg font-semibold text-foreground">
                        Kelola katalog & koleksi
                    </h2>
                    <p class="text-xs text-muted-foreground">
                        Akses cepat ke bagian yang paling sering kamu pakai.
                    </p>
                </div>

                <div
                    class="grid gap-4 md:grid-cols-3"
                >
                    <Link
                        href="/catalog"
                        class="group flex flex-col justify-between rounded-2xl border border-pink-100 bg-pink-50/80 p-4 text-sm shadow-sm transition hover:-translate-y-0.5 hover:border-pink-300 hover:bg-pink-50 hover:shadow-md dark:border-pink-500/40 dark:bg-pink-900/20"
                    >
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <p class="text-xs font-medium uppercase text-pink-500">
                                    Katalog
                                </p>
                                <h3 class="mt-1 text-base font-semibold text-pink-900 dark:text-pink-50">
                                    Lihat semua produk
                                </h3>
                            </div>
                            <span
                                class="flex h-8 w-8 items-center justify-center rounded-full bg-pink-500/10 text-pink-600 group-hover:bg-pink-500/20"
                            >
                                →
                            </span>
                        </div>
                        <p class="mt-3 text-xs text-pink-800/80 dark:text-pink-100/80">
                            Cek tampilan produk seperti yang dilihat pengunjung,
                            pastikan info harga & stok sudah sesuai.
                        </p>
                    </Link>

                    <div
                        class="flex flex-col justify-between rounded-2xl border border-pink-100 bg-white p-4 text-sm shadow-sm transition hover:-translate-y-0.5 hover:border-pink-200 hover:shadow-md dark:border-pink-500/40 dark:bg-pink-950/40"
                    >
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <p class="text-xs font-medium uppercase text-pink-500">
                                    Kategori
                                </p>
                                <h3 class="mt-1 text-base font-semibold">
                                    Atur kategori produk
                                </h3>
                            </div>
                            <span
                                class="flex h-8 w-8 items-center justify-center rounded-full bg-pink-500/5 text-pink-600"
                            >
                                ♡
                            </span>
                        </div>
                        <p class="mt-3 text-xs text-muted-foreground">
                            Kelompokkan produk berdasarkan tema, momen spesial, atau
                            jenis aksesori agar katalog terasa lebih rapi.
                        </p>
                    </div>

                    <div
                        class="flex flex-col justify-between rounded-2xl border border-pink-100 bg-white p-4 text-sm shadow-sm transition hover:-translate-y-0.5 hover:border-pink-200 hover:shadow-md dark:border-pink-500/40 dark:bg-pink-950/40"
                    >
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <p class="text-xs font-medium uppercase text-pink-500">
                                    Highlight
                                </p>
                                <h3 class="mt-1 text-base font-semibold">
                                    Rencanakan koleksi baru
                                </h3>
                            </div>
                            <span
                                class="flex h-8 w-8 items-center justify-center rounded-full bg-pink-500/5 text-pink-600"
                            >
                                ✨
                            </span>
                        </div>
                        <p class="mt-3 text-xs text-muted-foreground">
                            Gunakan dashboard ini sebagai ruang ide untuk campaign,
                            bundling hadiah, atau koleksi limited edition berikutnya.
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </AppLayout>
</template>
