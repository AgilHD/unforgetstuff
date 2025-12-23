# 🚀 Panduan Push Project ke GitHub untuk Kolaborasi

## 📋 Persiapan Sebelum Push

### 1. Pastikan File Sensitif Tidak Ter-Push

File `.gitignore` sudah dikonfigurasi dengan benar untuk mengabaikan:
- ✅ `.env` (file konfigurasi dengan kredensial)
- ✅ `vendor/` (dependencies PHP)
- ✅ `node_modules/` (dependencies Node.js)
- ✅ `public/build/` (file hasil build)
- ✅ File cache dan log

**PENTING:** Pastikan file `.env` TIDAK ter-push ke GitHub!

### 2. Buat File `.env.example` (Jika Belum Ada)

File ini berisi template konfigurasi tanpa nilai sensitif, untuk membantu kolaborator setup:

```bash
# Copy .env ke .env.example (jika belum ada)
copy .env .env.example
```

Lalu edit `.env.example` dan hapus/ubah nilai sensitif seperti:
- Database password
- API keys
- Secret keys

---

## 🔄 Langkah-Langkah Push ke GitHub

### Step 1: Cek Status Git

```bash
git status
```

Ini akan menampilkan file-file yang belum di-track.

### Step 2: Tambahkan Semua File ke Staging

```bash
# Tambahkan semua file (kecuali yang ada di .gitignore)
git add .
```

Atau tambahkan file secara bertahap:
```bash
git add app/
git add resources/
git add routes/
git add config/
# ... dst
```

### Step 3: Commit Perubahan

```bash
git commit -m "Initial commit: Laravel + Vue 3 + Inertia.js project setup"
```

Atau dengan pesan yang lebih deskriptif:
```bash
git commit -m "feat: setup Laravel 12 with Vue 3, Inertia.js, and Tailwind CSS

- Configure Laravel Fortify for authentication
- Setup Inertia.js bridge
- Install Reka UI components
- Setup TypeScript and Vite
- Add database migrations and seeders"
```

### Step 4: Push ke GitHub

```bash
# Push ke branch main
git push -u origin main
```

Jika branch Anda berbeda (misalnya `master`):
```bash
git push -u origin master
```

---

## 👥 Setup untuk Kolaborator

### Step 1: Clone Repository

```bash
git clone https://github.com/AgilHD/unforgetstuff.git
cd unforgetstuff
```

### Step 2: Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### Step 3: Setup Environment

```bash
# Copy file .env.example ke .env
copy .env.example .env

# Atau di Linux/Mac:
# cp .env.example .env

# Generate application key
php artisan key:generate
```

### Step 4: Setup Database

```bash
# Jalankan migrations
php artisan migrate

# (Opsional) Seed database
php artisan db:seed
```

### Step 5: Build Assets

```bash
# Build untuk production
npm run build

# Atau jalankan dev server (untuk development)
npm run dev
```

### Step 6: Jalankan Aplikasi

```bash
# Development mode dengan hot reload
composer run dev

# Atau manual:
php artisan serve
# (di terminal lain)
npm run dev
```

---

## 🔀 Workflow Kolaborasi

### Pull Perubahan Terbaru

```bash
# Sebelum mulai kerja, selalu pull perubahan terbaru
git pull origin main
```

### Buat Branch Baru untuk Fitur

```bash
# Buat dan switch ke branch baru
git checkout -b feature/nama-fitur

# Atau menggunakan git switch (Git 2.23+)
git switch -c feature/nama-fitur
```

### Commit dan Push Perubahan

```bash
# Tambahkan perubahan
git add .

# Commit dengan pesan yang jelas
git commit -m "feat: tambahkan fitur review produk"

# Push branch ke GitHub
git push -u origin feature/nama-fitur
```

### Buat Pull Request

1. Buka GitHub repository
2. Klik "Compare & pull request"
3. Isi deskripsi perubahan
4. Request review dari kolaborator
5. Setelah di-approve, merge ke `main`

### Update Branch dari Main

```bash
# Kembali ke branch main
git checkout main

# Pull perubahan terbaru
git pull origin main

# Kembali ke branch fitur
git checkout feature/nama-fitur

# Merge main ke branch fitur
git merge main
```

---

## 📝 Best Practices

### 1. Commit Message yang Baik

Gunakan format conventional commits:
```
feat: tambahkan fitur baru
fix: perbaiki bug
docs: update dokumentasi
style: format kode
refactor: refactor kode
test: tambahkan test
chore: update dependencies
```

### 2. Jangan Commit File yang Tidak Perlu

- ❌ Jangan commit `.env`
- ❌ Jangan commit `node_modules/`
- ❌ Jangan commit `vendor/`
- ❌ Jangan commit file cache
- ✅ Commit `.env.example` (template)
- ✅ Commit `composer.json` dan `package.json`
- ✅ Commit source code

### 3. Pull Sebelum Push

Selalu pull perubahan terbaru sebelum push:
```bash
git pull origin main
git push origin main
```

### 4. Gunakan Branch untuk Fitur Besar

Jangan langsung commit ke `main`, gunakan branch:
```bash
git checkout -b feature/nama-fitur
# ... buat perubahan ...
git push -u origin feature/nama-fitur
```

---

## 🚨 Troubleshooting

### Error: "Updates were rejected"

**Penyebab:** Ada perubahan di remote yang belum di-pull

**Solusi:**
```bash
git pull origin main
# Resolve conflict jika ada
git push origin main
```

### Error: "Permission denied"

**Penyebab:** Tidak punya akses ke repository

**Solusi:**
- Pastikan sudah di-invite sebagai kolaborator di GitHub
- Atau fork repository dan buat pull request

### File .env Ter-Push

**Solusi:**
```bash
# Hapus dari Git (tapi tetap di local)
git rm --cached .env

# Commit perubahan
git commit -m "chore: remove .env from repository"

# Push
git push origin main

# Tambahkan ke .gitignore (jika belum ada)
echo ".env" >> .gitignore
```

### Conflict saat Merge

**Solusi:**
```bash
# Pull dengan rebase
git pull --rebase origin main

# Resolve conflict di file yang bermasalah
# Setelah resolve:
git add .
git rebase --continue
```

---

## 📚 Referensi

- [Git Documentation](https://git-scm.com/doc)
- [GitHub Guides](https://guides.github.com/)
- [Conventional Commits](https://www.conventionalcommits.org/)

---

## ✅ Checklist Sebelum Push Pertama

- [ ] File `.env` sudah di-ignore (cek `.gitignore`)
- [ ] File `.env.example` sudah dibuat (template tanpa nilai sensitif)
- [ ] Semua dependencies sudah di-ignore (`vendor/`, `node_modules/`)
- [ ] File cache sudah di-ignore
- [ ] Sudah test aplikasi berjalan dengan baik
- [ ] README.md sudah di-update dengan instruksi setup
- [ ] Commit message sudah jelas dan deskriptif

