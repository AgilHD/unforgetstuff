# Dokumentasi Kerangka Project - UnforgetStuff

## 📋 Ringkasan Project

**UnforgetStuff** adalah aplikasi e-commerce untuk toko aksesori yang dibangun dengan teknologi modern full-stack. Project ini menggunakan **Laravel** sebagai backend dan **Vue 3** dengan **Inertia.js** sebagai frontend, menciptakan pengalaman SPA (Single Page Application) tanpa perlu API terpisah.

---

## 🛠️ Tech Stack

### Backend
- **Laravel 12** - PHP Framework
- **Laravel Fortify** - Authentication & Authorization
- **Laravel Inertia** - Bridge antara Laravel dan Vue
- **SQLite** - Database (dapat diganti ke MySQL/PostgreSQL)
- **Pest PHP** - Testing Framework

### Frontend
- **Vue 3** (Composition API) - JavaScript Framework
- **TypeScript** - Type Safety
- **Inertia.js** - SPA tanpa API
- **Tailwind CSS 4** - Styling Framework
- **Reka UI** - Component Library (shadcn/ui style)
- **Vite** - Build Tool & Dev Server

### Tools & Development
- **ESLint** - Code Linting
- **Prettier** - Code Formatting
- **Laravel Wayfinder** - Type-safe route helpers

---

## 🏗️ Arsitektur Project

### Konsep Arsitektur: **Inertia.js Stack**

```
┌─────────────────────────────────────────────────┐
│              Browser (User)                      │
└──────────────────┬──────────────────────────────┘
                   │
┌──────────────────▼──────────────────────────────┐
│         Vue 3 Frontend (SPA)                    │
│  - Pages (resources/js/pages/)                  │
│  - Components (resources/js/components/)        │
│  - Routes (resources/js/routes/)                │
└──────────────────┬──────────────────────────────┘
                   │
         ┌─────────┴─────────┐
         │   Inertia.js      │
         │   (Bridge Layer)  │
         └─────────┬─────────┘
                   │
┌──────────────────▼──────────────────────────────┐
│         Laravel Backend                         │
│  - Controllers (app/Http/Controllers/)          │
│  - Models (app/Models/)                         │
│  - Routes (routes/)                             │
│  - Middleware (app/Http/Middleware/)            │
└──────────────────┬──────────────────────────────┘
                   │
┌──────────────────▼──────────────────────────────┐
│         Database (SQLite)                       │
└─────────────────────────────────────────────────┘
```

**Keuntungan Arsitektur Ini:**
- ✅ Tidak perlu membuat API terpisah
- ✅ Server-side routing dengan client-side rendering
- ✅ Shared authentication state
- ✅ SEO-friendly dengan SSR support
- ✅ Type-safe routes dengan Wayfinder

---

## 📁 Struktur Direktori & Penjelasan

### Backend (Laravel)

```
app/
├── Actions/
│   └── Fortify/              # Custom Fortify actions (login, register, dll)
├── Http/
│   ├── Controllers/
│   │   ├── Admin/            # Controller untuk admin panel
│   │   │   ├── DashboardController.php
│   │   │   └── ProductController.php
│   │   ├── Settings/         # Controller untuk user settings
│   │   │   ├── PasswordController.php
│   │   │   ├── ProfileController.php
│   │   │   └── TwoFactorAuthenticationController.php
│   │   └── Storefront/       # Controller untuk public pages
│   │       ├── HomeController.php
│   │       └── ProductController.php
│   ├── Middleware/           # Custom middleware
│   └── Requests/             # Form Request Validation
├── Models/
│   ├── User.php              # User model dengan role & 2FA
│   ├── Product.php           # Product model
│   └── Category.php          # Category model
└── Providers/                # Service Providers

routes/
├── web.php                   # Main routes (public & admin)
└── settings.php              # Settings routes (profile, password, 2FA)

database/
├── migrations/               # Database migrations
├── seeders/                  # Database seeders
└── factories/                # Model factories untuk testing
```

### Frontend (Vue 3 + TypeScript)

```
resources/js/
├── app.ts                    # Entry point aplikasi
├── ssr.ts                    # Server-side rendering entry
├── pages/                    # Halaman-halaman (mirip dengan views di Laravel)
│   ├── admin/                # Admin pages
│   │   ├── Dashboard.vue
│   │   └── products/
│   │       ├── Index.vue
│   │       ├── Create.vue
│   │       └── Edit.vue
│   ├── auth/                 # Authentication pages
│   │   ├── Login.vue
│   │   ├── Register.vue
│   │   └── ...
│   ├── public/               # Public pages
│   │   ├── Home.vue
│   │   ├── Catalog.vue
│   │   └── ProductDetail.vue
│   └── settings/             # User settings pages
│       ├── Profile.vue
│       ├── Password.vue
│       └── ...
├── components/               # Reusable components
│   ├── ui/                   # UI components (Reka UI)
│   │   ├── button/
│   │   ├── card/
│   │   ├── dialog/
│   │   └── ...
│   ├── AppShell.vue          # Main layout wrapper
│   ├── AppSidebar.vue        # Sidebar navigation
│   └── ...
├── layouts/                  # Layout templates
│   ├── PublicLayout.vue      # Layout untuk public pages
│   └── AuthenticatedLayout.vue  # Layout untuk authenticated pages
├── routes/                   # Type-safe route helpers (Wayfinder)
│   ├── admin/
│   ├── catalog/
│   └── ...
├── composables/              # Vue composables (reusable logic)
├── actions/                  # Inertia form actions
└── types/                    # TypeScript type definitions
```

---

## 🎯 Pembagian Tugas untuk Tim

### 1. **Backend Developer (Laravel)**

**Tanggung Jawab:**
- Membuat/mengupdate Models dan Relationships
- Membuat Controllers dan Business Logic
- Membuat Database Migrations
- Membuat Form Request Validation
- Membuat Middleware jika diperlukan
- Testing dengan Pest PHP

**File yang Sering Dikerjakan:**
- `app/Models/*.php`
- `app/Http/Controllers/**/*.php`
- `app/Http/Requests/*.php`
- `database/migrations/*.php`
- `routes/web.php` atau `routes/settings.php`

**Contoh Task:**
```
Task: Tambahkan fitur review produk
- Buat migration: create_reviews_table
- Buat model: Review.php
- Update Product model: tambahkan relationship reviews()
- Buat controller: ReviewController.php
- Tambahkan routes di web.php
- Buat form request: StoreReviewRequest.php
```

---

### 2. **Frontend Developer (Vue 3)**

**Tanggung Jawab:**
- Membuat/mengupdate Vue Pages
- Membuat Reusable Components
- Styling dengan Tailwind CSS
- Integrasi dengan Inertia.js
- TypeScript type definitions
- Client-side validation & UX

**File yang Sering Dikerjakan:**
- `resources/js/pages/**/*.vue`
- `resources/js/components/**/*.vue`
- `resources/js/layouts/*.vue`
- `resources/js/routes/**/*.ts` (untuk type-safe routes)
- `resources/js/types/*.ts`

**Contoh Task:**
```
Task: Buat halaman review produk
- Buat page: resources/js/pages/public/ProductReviews.vue
- Buat component: resources/js/components/ReviewCard.vue
- Update ProductDetail.vue: tambahkan section reviews
- Tambahkan route helper di resources/js/routes/catalog/
```

---

### 3. **Full-Stack Developer**

**Tanggung Jawab:**
- Mengintegrasikan Backend dan Frontend
- Memastikan data flow dari Controller ke Vue Page
- Handle Inertia responses
- Error handling & validation display
- Optimasi performa

**File yang Sering Dikerjakan:**
- Controller methods yang return `Inertia::render()`
- Vue pages yang menerima props dari backend
- Form handling dengan Inertia form helper

**Contoh Task:**
```
Task: Implementasi form review
Backend:
- ReviewController@store: handle form submission
- Return redirect dengan flash message

Frontend:
- ProductReviews.vue: buat form dengan useForm dari Inertia
- Handle success/error responses
- Update UI setelah submit
```

---

### 4. **UI/UX Designer**

**Tanggung Jawab:**
- Design system & component library
- Styling dengan Tailwind CSS
- Responsive design
- Accessibility (a11y)
- Animasi & transitions

**File yang Sering Dikerjakan:**
- `resources/js/components/ui/**/*.vue`
- `resources/css/app.css`
- Tailwind config (jika ada custom theme)
- Component styling di pages

---

### 5. **QA/Testing**

**Tanggung Jawab:**
- Menulis Feature Tests (Pest PHP)
- Menulis Unit Tests
- E2E Testing (jika ada)
- Bug reporting

**File yang Sering Dikerjakan:**
- `tests/Feature/**/*.php`
- `tests/Unit/**/*.php`

---

## 🔄 Alur Kerja Development

### Menambah Fitur Baru

1. **Planning**
   - Tentukan fitur yang akan dibuat
   - Identifikasi models, controllers, dan pages yang diperlukan

2. **Database**
   - Buat migration: `php artisan make:migration create_xxx_table`
   - Update model dengan relationships

3. **Backend**
   - Buat controller: `php artisan make:controller XxxController`
   - Buat form request (jika ada form): `php artisan make:request StoreXxxRequest`
   - Tambahkan routes di `routes/web.php`
   - Return data dengan `Inertia::render('pages/Xxx', ['data' => $data])`

4. **Frontend**
   - Buat Vue page di `resources/js/pages/`
   - Buat components jika diperlukan
   - Gunakan route helper dari Wayfinder untuk links
   - Handle forms dengan `useForm` dari Inertia

5. **Testing**
   - Tulis feature tests
   - Test manual di browser

6. **Styling**
   - Apply Tailwind CSS classes
   - Pastikan responsive

---

## 📝 Contoh Implementasi

### Contoh 1: Menambah Field ke Product

**Backend:**
```php
// 1. Migration
php artisan make:migration add_discount_to_products_table

// 2. Update Product Model
protected $fillable = [
    // ... existing fields
    'discount',
];
```

**Frontend:**
```vue
<!-- resources/js/pages/admin/products/Edit.vue -->
<Input
    v-model="form.discount"
    type="number"
    label="Discount (%)"
/>
```

---

### Contoh 2: Membuat Halaman Baru

**Backend:**
```php
// routes/web.php
Route::get('/about', [AboutController::class, 'index'])->name('about');

// app/Http/Controllers/AboutController.php
public function index()
{
    return Inertia::render('public/About');
}
```

**Frontend:**
```vue
<!-- resources/js/pages/public/About.vue -->
<script setup lang="ts">
import PublicLayout from '@/layouts/PublicLayout.vue';
</script>

<template>
    <PublicLayout>
        <h1>About Us</h1>
    </PublicLayout>
</template>
```

---

## 🚀 Command yang Sering Digunakan

### Development
```bash
# Start development server (Laravel + Vite)
composer dev

# Start dengan SSR
composer dev:ssr

# Build untuk production
npm run build
npm run build:ssr
```

### Laravel
```bash
# Create migration
php artisan make:migration create_xxx_table

# Create controller
php artisan make:controller XxxController

# Create model
php artisan make:model Xxx

# Run migration
php artisan migrate

# Run tests
php artisan test
```

### Frontend
```bash
# Format code
npm run format

# Lint code
npm run lint

# Type check
npm run type-check  # (jika ada script ini)
```

---

## 🔐 Authentication & Authorization

### Authentication
- Menggunakan **Laravel Fortify**
- Support: Login, Register, 2FA, Email Verification
- Routes otomatis di-handle oleh Fortify

### Authorization
- Role-based: `admin` dan `user`
- Middleware: `admin` untuk proteksi admin routes
- Check di controller: `$request->user()->role === 'admin'`

---

## 📦 Key Dependencies

### Backend (composer.json)
- `laravel/framework: ^12.0`
- `inertiajs/inertia-laravel: ^2.0`
- `laravel/fortify: ^1.30`

### Frontend (package.json)
- `vue: ^3.5.13`
- `@inertiajs/vue3: ^2.1.0`
- `tailwindcss: ^4.1.1`
- `reka-ui: ^2.6.1` (shadcn/ui untuk Vue)
- `typescript: ^5.2.2`

---

## 🎨 Design System

### UI Components
Project menggunakan **Reka UI** (port dari shadcn/ui untuk Vue):
- Button, Card, Dialog, Input, dll
- Lokasi: `resources/js/components/ui/`
- Fully customizable dengan Tailwind

### Styling
- **Tailwind CSS 4** untuk utility-first styling
- Dark mode support (via `useAppearance` composable)
- Custom theme colors (pink/rose untuk brand)

---

## 📚 Resources & Dokumentasi

### Official Docs
- [Laravel 12 Docs](https://laravel.com/docs/12.x)
- [Inertia.js Docs](https://inertiajs.com)
- [Vue 3 Docs](https://vuejs.org)
- [Tailwind CSS Docs](https://tailwindcss.com)
- [Reka UI Docs](https://reka-ui.com)

### Project-Specific
- Routes: Check `routes/web.php` dan `routes/settings.php`
- Type-safe routes: `resources/js/routes/`
- Components: `resources/js/components/ui/`

---

## ⚠️ Best Practices

1. **Backend**
   - Gunakan Form Requests untuk validation
   - Return data yang diperlukan saja (jangan over-fetch)
   - Gunakan Eloquent relationships
   - Jangan lupa type hints di PHP 8.2+

2. **Frontend**
   - Gunakan TypeScript untuk type safety
   - Gunakan composables untuk reusable logic
   - Keep components small & focused
   - Gunakan Wayfinder untuk type-safe routes

3. **General**
   - Follow PSR-12 untuk PHP
   - Follow Vue Style Guide
   - Write tests untuk critical features
   - Commit messages yang jelas

---

## 🐛 Troubleshooting

### Inertia tidak update setelah perubahan
```bash
# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Restart dev server
composer dev
```

### Type errors di TypeScript
```bash
# Rebuild types
npm run build
```

### Route tidak ditemukan
- Pastikan route sudah ditambahkan di `routes/web.php`
- Check middleware yang diperlukan
- Pastikan Wayfinder route sudah di-generate

---

## 📞 Kontak & Support

Jika ada pertanyaan tentang struktur project atau perlu bantuan, silakan:
1. Check dokumentasi di atas
2. Review code yang sudah ada sebagai reference
3. Tanyakan ke team lead atau senior developer

---

**Last Updated:** 2025-01-XX
**Version:** 1.0.0

