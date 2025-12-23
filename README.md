# 🛍️ UnforgetStuff - E-Commerce Platform

Aplikasi e-commerce modern untuk toko aksesori yang dibangun dengan **Laravel 12** dan **Vue 3** menggunakan **Inertia.js**.

## 🚀 Tech Stack

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

## 📋 Requirements

- PHP >= 8.2
- Composer
- Node.js >= 18
- npm atau yarn
- SQLite (default) atau MySQL/PostgreSQL

## 🛠️ Installation

### 1. Clone Repository

```bash
git clone https://github.com/AgilHD/unforgetstuff.git
cd unforgetstuff
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### 3. Setup Environment

```bash
# Copy file .env.example ke .env
copy .env.example .env

# Atau di Linux/Mac:
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Setup Database

```bash
# Jalankan migrations
php artisan migrate

# (Opsional) Seed database dengan data dummy
php artisan db:seed
```

### 5. Build Assets

```bash
# Build untuk production
npm run build

# Atau jalankan dev server (untuk development)
npm run dev
```

### 6. Jalankan Aplikasi

```bash
# Development mode dengan hot reload (semua service sekaligus)
composer run dev

# Atau manual:
php artisan serve
# (di terminal lain)
npm run dev
```

Akses aplikasi di: `http://localhost:8000`

## 📚 Dokumentasi

- **[PROJECT_FRAMEWORK.md](./PROJECT_FRAMEWORK.md)** - Dokumentasi lengkap arsitektur project
- **[TASK_DIVISION_GUIDE.md](./TASK_DIVISION_GUIDE.md)** - Panduan pembagian tugas tim
- **[DESIGN_SYSTEM.md](./DESIGN_SYSTEM.md)** - Design system dan komponen UI
- **[GITHUB_SETUP.md](./GITHUB_SETUP.md)** - Panduan setup GitHub dan kolaborasi

## 🧪 Testing

```bash
# Jalankan semua test
php artisan test

# Atau menggunakan Pest langsung
./vendor/bin/pest
```

## 👥 Kolaborasi

Lihat **[GITHUB_SETUP.md](./GITHUB_SETUP.md)** untuk panduan lengkap tentang:
- Workflow Git
- Cara membuat branch baru
- Pull request process
- Best practices

## 📝 Scripts yang Tersedia

```bash
# Setup project (install dependencies, generate key, migrate, build)
composer run setup

# Development mode (server + queue + vite)
composer run dev

# Development mode dengan SSR
composer run dev:ssr

# Testing
composer run test
```

## 🗂️ Struktur Project

```
unforgetstuff/
├── app/                    # Backend (Laravel)
│   ├── Http/
│   │   ├── Controllers/   # Controllers
│   │   └── Middleware/    # Custom middleware
│   └── Models/            # Eloquent models
├── resources/
│   ├── js/                # Frontend (Vue 3)
│   │   ├── pages/         # Halaman-halaman
│   │   ├── components/    # Komponen reusable
│   │   └── layouts/       # Layout templates
│   └── css/               # Styles
├── routes/                # Route definitions
├── database/              # Migrations, seeders, factories
└── public/                # Public assets (entry point)
```

## 🔐 Default Credentials

Setelah menjalankan seeder, default admin credentials:
- Email: `admin@example.com`
- Password: `password`

**⚠️ PENTING:** Ganti credentials ini di production!

## 📄 License

MIT License

## 👨‍💻 Contributors

- [AgilHD](https://github.com/AgilHD)

---

**Happy Coding! 🚀**
