# 🎯 Quick Guide: Pembagian Tugas Tim

## 📋 Ringkasan Cepat

**Tech Stack:** Laravel 12 + Vue 3 + Inertia.js + TypeScript + Tailwind CSS

**Arsitektur:** Full-stack SPA tanpa API terpisah (Inertia.js sebagai bridge)

---

## 👥 Role & Tanggung Jawab

### 🔴 Backend Developer (Laravel)

**Fokus:** Server-side logic, database, API responses

| Task | File yang Dikerjakan | Command |
|------|---------------------|---------|
| Buat Model baru | `app/Models/Xxx.php` | `php artisan make:model Xxx` |
| Buat Migration | `database/migrations/xxx.php` | `php artisan make:migration` |
| Buat Controller | `app/Http/Controllers/XxxController.php` | `php artisan make:controller` |
| Buat Form Validation | `app/Http/Requests/XxxRequest.php` | `php artisan make:request` |
| Tambah Route | `routes/web.php` atau `routes/settings.php` | Manual edit |
| Buat Middleware | `app/Http/Middleware/Xxx.php` | `php artisan make:middleware` |
| Testing | `tests/Feature/XxxTest.php` | `php artisan make:test` |

**Contoh Workflow:**
```
1. php artisan make:migration create_reviews_table
2. php artisan make:model Review
3. php artisan make:controller ReviewController
4. Edit routes/web.php → tambahkan route
5. Edit controller → return Inertia::render('pages/Review')
6. php artisan migrate
```

---

### 🔵 Frontend Developer (Vue 3)

**Fokus:** UI/UX, components, client-side logic

| Task | File yang Dikerjakan | Command |
|------|---------------------|---------|
| Buat Page baru | `resources/js/pages/Xxx.vue` | Manual create |
| Buat Component | `resources/js/components/Xxx.vue` | Manual create |
| Buat UI Component | `resources/js/components/ui/xxx/` | Manual create |
| Update Layout | `resources/js/layouts/Xxx.vue` | Manual edit |
| Tambah Route Type | `resources/js/routes/xxx/index.ts` | Manual edit |
| Styling | Tailwind classes di `.vue` files | Manual edit |

**Contoh Workflow:**
```
1. Buat file: resources/js/pages/public/Review.vue
2. Import layout: PublicLayout
3. Buat form dengan useForm dari Inertia
4. Style dengan Tailwind CSS
5. Test di browser
```

---

### 🟢 Full-Stack Developer

**Fokus:** Integrasi backend-frontend, end-to-end features

**Workflow:**
```
1. Backend: Buat controller + return Inertia::render()
2. Frontend: Buat page yang menerima props
3. Connect: Pastikan data flow lancar
4. Test: Manual testing di browser
5. Polish: Error handling, loading states, dll
```

**File yang Sering Dikerjakan:**
- Controller methods (return Inertia responses)
- Vue pages (terima props dari backend)
- Form handling (backend validation + frontend display)

---

### 🟡 UI/UX Designer

**Fokus:** Design, styling, user experience

| Task | File yang Dikerjakan |
|------|---------------------|
| Design Components | `resources/js/components/ui/` |
| Styling Pages | Tailwind classes di pages |
| Responsive Design | Media queries di Tailwind |
| Dark Mode | `resources/js/composables/useAppearance.ts` |
| Animations | Tailwind animation classes |

---

## 🎯 Task Assignment Matrix

### Fitur: "Tambah Review Produk"

| Role | Task | File | Estimasi |
|------|------|------|----------|
| **Backend** | Buat migration reviews table | `database/migrations/xxx_create_reviews_table.php` | 30 min |
| **Backend** | Buat model Review | `app/Models/Review.php` | 20 min |
| **Backend** | Update Product model (relationship) | `app/Models/Product.php` | 10 min |
| **Backend** | Buat ReviewController | `app/Http/Controllers/ReviewController.php` | 1 hour |
| **Backend** | Buat StoreReviewRequest | `app/Http/Requests/StoreReviewRequest.php` | 30 min |
| **Backend** | Tambah routes | `routes/web.php` | 10 min |
| **Frontend** | Buat ReviewCard component | `resources/js/components/ReviewCard.vue` | 1 hour |
| **Frontend** | Buat ReviewForm component | `resources/js/components/ReviewForm.vue` | 1.5 hour |
| **Frontend** | Update ProductDetail page | `resources/js/pages/public/ProductDetail.vue` | 1 hour |
| **Full-Stack** | Integrasi form submit | Controller + Vue page | 1 hour |
| **UI/UX** | Styling components | Tailwind classes | 1 hour |
| **QA** | Testing fitur | Manual + Automated | 1 hour |

**Total Estimasi:** ~9.5 jam

---

## 📂 File Structure Quick Reference

### Backend Files
```
app/
├── Models/              ← Data models
├── Http/
│   ├── Controllers/     ← Request handlers
│   ├── Requests/        ← Form validation
│   └── Middleware/      ← Request filters
routes/
├── web.php              ← Main routes
└── settings.php         ← Settings routes
database/
├── migrations/          ← Database schema
└── seeders/            ← Initial data
```

### Frontend Files
```
resources/js/
├── pages/               ← Halaman (mirip views)
│   ├── admin/          ← Admin pages
│   ├── auth/           ← Auth pages
│   └── public/         ← Public pages
├── components/          ← Reusable components
│   └── ui/             ← UI library components
├── layouts/            ← Page layouts
├── routes/             ← Type-safe route helpers
└── composables/        ← Reusable Vue logic
```

---

## 🔄 Common Workflows

### Workflow 1: Menambah Field ke Database

**Backend:**
1. `php artisan make:migration add_xxx_to_products_table`
2. Edit migration file
3. `php artisan migrate`
4. Update Model: tambahkan ke `$fillable`
5. Update Controller: handle field baru
6. Update Form Request: validasi field baru

**Frontend:**
1. Update form di page (Create/Edit)
2. Tambahkan input field
3. Bind ke form data
4. Style dengan Tailwind

---

### Workflow 2: Membuat Halaman Baru

**Backend:**
1. `php artisan make:controller XxxController`
2. Buat method `index()` atau `show()`
3. Return: `Inertia::render('pages/Xxx', ['data' => $data])`
4. Tambah route di `routes/web.php`

**Frontend:**
1. Buat file: `resources/js/pages/Xxx.vue`
2. Import layout yang sesuai
3. Terima props dari backend
4. Render data
5. Style dengan Tailwind

---

### Workflow 3: Membuat Form dengan Validation

**Backend:**
1. `php artisan make:request StoreXxxRequest`
2. Define rules di `rules()` method
3. Controller: inject request di method
4. Return redirect setelah success

**Frontend:**
1. Import `useForm` dari `@inertiajs/vue3`
2. Buat form dengan `form.post(route('xxx.store'))`
3. Display errors: `form.errors.xxx`
4. Show success message setelah submit

---

## 🚨 Common Issues & Solutions

| Issue | Solution |
|-------|----------|
| Inertia tidak update | `php artisan cache:clear` + restart dev server |
| Route tidak ditemukan | Check `routes/web.php` + pastikan middleware benar |
| Type error di TS | Rebuild: `npm run build` |
| Form validation error tidak muncul | Pastikan `form.errors` di-render di template |
| Styling tidak apply | Check Tailwind classes + pastikan build ulang |

---

## 📝 Checklist Sebelum Commit

### Backend
- [ ] Migration sudah di-run
- [ ] Model relationships sudah benar
- [ ] Form validation sudah ada
- [ ] Error handling sudah ada
- [ ] Return Inertia response dengan data yang benar

### Frontend
- [ ] TypeScript types sudah benar
- [ ] Props sudah didefinisikan dengan `defineProps`
- [ ] Error handling sudah ada
- [ ] Loading states sudah ada
- [ ] Responsive design sudah dicek
- [ ] Dark mode sudah support (jika perlu)

### General
- [ ] Code sudah di-format (`npm run format`)
- [ ] Linter sudah pass (`npm run lint`)
- [ ] Manual testing sudah dilakukan
- [ ] Commit message jelas

---

## 🎓 Learning Resources

### Untuk Backend Developer
- Laravel Docs: https://laravel.com/docs
- Inertia Laravel: https://inertiajs.com/server-side-setup
- Eloquent Relationships: https://laravel.com/docs/eloquent-relationships

### Untuk Frontend Developer
- Vue 3 Docs: https://vuejs.org
- Inertia Vue: https://inertiajs.com/client-side-setup
- Tailwind CSS: https://tailwindcss.com/docs
- Reka UI: https://reka-ui.com

### Untuk Full-Stack
- Inertia.js Guide: https://inertiajs.com
- Laravel + Vue Best Practices

---

## 📞 Quick Contacts

- **Project Lead:** [Nama]
- **Backend Lead:** [Nama]
- **Frontend Lead:** [Nama]
- **Designer:** [Nama]

---

**Tips:** Bookmark file ini untuk quick reference saat development! 🚀

