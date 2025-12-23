<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ShoppingBag, Menu, X, Instagram, MessageCircle } from 'lucide-vue-next';
import { ref, onMounted, onUnmounted } from 'vue';

const isScrolled = ref(false);
const isMobileMenuOpen = ref(false);

const handleScroll = () => {
    isScrolled.value = window.scrollY > 20;
};

onMounted(() => {
    window.addEventListener('scroll', handleScroll);
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});
</script>

<template>
    <div class="flex min-h-screen flex-col bg-neutral-50 text-neutral-900 dark:bg-neutral-950 dark:text-neutral-100">
        <!-- Navbar -->
        <header
            :class="[
                'sticky top-0 z-50 w-full border-b transition-all duration-300',
                isScrolled
                    ? 'border-neutral-200 bg-white/95 backdrop-blur-md shadow-sm dark:border-neutral-800 dark:bg-neutral-900/95'
                    : 'border-transparent bg-white/80 backdrop-blur-sm dark:bg-neutral-900/80',
            ]"
        >
            <nav class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
                <!-- Logo -->
                <Link
                    href="/"
                    class="flex items-center gap-2 transition-opacity hover:opacity-80"
                >
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-rose-500 to-pink-500 text-white shadow-md">
                        <ShoppingBag class="h-6 w-6" />
                    </div>
                    <div class="hidden sm:block">
                        <div class="text-lg font-bold text-neutral-900 dark:text-neutral-100">
                            unforgettwblestuff
                        </div>
                        <div class="text-xs text-neutral-500">
                            aksesoris yang diingat
                        </div>
                    </div>
                </Link>

                <!-- Desktop Navigation -->
                <div class="hidden items-center gap-8 md:flex">
                    <Link
                        href="/"
                        class="text-sm font-medium text-neutral-700 transition-colors hover:text-rose-600 dark:text-neutral-300 dark:hover:text-rose-400"
                    >
                        Beranda
                    </Link>
                    <Link
                        href="/#catalog"
                        class="text-sm font-medium text-neutral-700 transition-colors hover:text-rose-600 dark:text-neutral-300 dark:hover:text-rose-400"
                    >
                        Katalog
                    </Link>
                    <a
                        href="https://wa.me/6281234567890"
                        target="_blank"
                        rel="noreferrer"
                        class="inline-flex items-center gap-2 rounded-full bg-rose-500 px-5 py-2 text-sm font-semibold text-white shadow-md transition-all hover:bg-rose-600 hover:shadow-lg"
                    >
                        <MessageCircle class="h-4 w-4" />
                        Hubungi Kami
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button
                    class="rounded-lg p-2 text-neutral-700 transition-colors hover:bg-neutral-100 dark:text-neutral-300 dark:hover:bg-neutral-800 md:hidden"
                    @click="isMobileMenuOpen = !isMobileMenuOpen"
                >
                    <Menu v-if="!isMobileMenuOpen" class="h-6 w-6" />
                    <X v-else class="h-6 w-6" />
                </button>
            </nav>

            <!-- Mobile Menu -->
            <div
                v-if="isMobileMenuOpen"
                class="border-t border-neutral-200 bg-white dark:border-neutral-800 dark:bg-neutral-900 md:hidden"
            >
                <div class="mx-auto max-w-7xl space-y-1 px-4 py-4">
                    <Link
                        href="/"
                        class="block rounded-lg px-4 py-3 text-sm font-medium text-neutral-700 transition-colors hover:bg-neutral-100 hover:text-rose-600 dark:text-neutral-300 dark:hover:bg-neutral-800"
                        @click="isMobileMenuOpen = false"
                    >
                        Beranda
                    </Link>
                    <Link
                        href="/#catalog"
                        class="block rounded-lg px-4 py-3 text-sm font-medium text-neutral-700 transition-colors hover:bg-neutral-100 hover:text-rose-600 dark:text-neutral-300 dark:hover:bg-neutral-800"
                        @click="isMobileMenuOpen = false"
                    >
                        Katalog
                    </Link>
                    <a
                        href="https://wa.me/6281234567890"
                        target="_blank"
                        rel="noreferrer"
                        class="block rounded-lg bg-rose-500 px-4 py-3 text-center text-sm font-semibold text-white transition-colors hover:bg-rose-600"
                        @click="isMobileMenuOpen = false"
                    >
                        Hubungi Kami via WhatsApp
                    </a>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1">
            <slot />
        </main>

        <!-- Footer -->
        <footer class="border-t border-neutral-200 bg-white dark:border-neutral-800 dark:bg-neutral-900">
            <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
                <div class="grid gap-8 md:grid-cols-4">
                    <!-- Brand -->
                    <div class="md:col-span-2">
                        <Link href="/" class="mb-4 flex items-center gap-2">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-rose-500 to-pink-500 text-white">
                                <ShoppingBag class="h-6 w-6" />
                            </div>
                            <div>
                                <div class="text-lg font-bold text-neutral-900 dark:text-neutral-100">
                                    unforgettwblestuff
                                </div>
                                <div class="text-xs text-neutral-500">
                                    aksesoris yang diingat
                                </div>
                            </div>
                        </Link>
                        <p class="mt-4 max-w-md text-sm text-neutral-600 dark:text-neutral-400">
                            Toko aksesori timeless yang siap jadi hadiah berkesan. 
                            Kurasi gelang, kalung, dan aksesori manis yang mudah dipadu-padankan.
                        </p>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h3 class="mb-4 text-sm font-semibold uppercase tracking-wider text-neutral-900 dark:text-neutral-100">
                            Tautan
                        </h3>
                        <ul class="space-y-3">
                            <li>
                                <Link
                                    href="/"
                                    class="text-sm text-neutral-600 transition-colors hover:text-rose-600 dark:text-neutral-400 dark:hover:text-rose-400"
                                >
                                    Beranda
                                </Link>
                            </li>
                            <li>
                                <Link
                                    href="/#catalog"
                                    class="text-sm text-neutral-600 transition-colors hover:text-rose-600 dark:text-neutral-400 dark:hover:text-rose-400"
                                >
                                    Katalog
                                </Link>
                            </li>
                        </ul>
                    </div>

                    <!-- Contact -->
                    <div>
                        <h3 class="mb-4 text-sm font-semibold uppercase tracking-wider text-neutral-900 dark:text-neutral-100">
                            Hubungi Kami
                        </h3>
                        <ul class="space-y-3">
                            <li>
                                <a
                                    href="https://wa.me/6281234567890"
                                    target="_blank"
                                    rel="noreferrer"
                                    class="inline-flex items-center gap-2 text-sm text-neutral-600 transition-colors hover:text-rose-600 dark:text-neutral-400 dark:hover:text-rose-400"
                                >
                                    <MessageCircle class="h-4 w-4" />
                                    WhatsApp
                                </a>
                            </li>
                            <li>
                                <a
                                    href="https://instagram.com/unforgettwblestuff"
                                    target="_blank"
                                    rel="noreferrer"
                                    class="inline-flex items-center gap-2 text-sm text-neutral-600 transition-colors hover:text-rose-600 dark:text-neutral-400 dark:hover:text-rose-400"
                                >
                                    <Instagram class="h-4 w-4" />
                                    Instagram
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mt-8 border-t border-neutral-200 pt-8 dark:border-neutral-800">
                    <p class="text-center text-sm text-neutral-600 dark:text-neutral-400">
                        © {{ new Date().getFullYear() }} unforgettwblestuff. All rights reserved.
                    </p>
                </div>
            </div>
        </footer>
    </div>
</template>


