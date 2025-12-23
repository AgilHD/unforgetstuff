# 🔐 Panduan Akses Admin Panel

## ✅ Cara Login ke Admin Panel

### 1. Akses URL Admin
Buka browser dan ketik:
```
http://unforgetstuff.test/admin
```

### 2. Akan Di-redirect ke Login
Jika belum login, Anda akan otomatis di-redirect ke halaman login.

### 3. Login dengan Credential Admin
- **Email**: `admin@unforgetstuff.test`
- **Password**: `password`

### 4. Setelah Login
Anda akan otomatis di-redirect ke `/admin` (Admin Dashboard).

---

## 🔍 Troubleshooting

### Masalah: Error 403 Forbidden
**Penyebab**: User tidak memiliki role 'admin'

**Solusi**:
1. Pastikan user yang login memiliki role 'admin'
2. Cek dengan command: `php artisan admin:check`
3. Update role user jika perlu:
   ```bash
   php artisan tinker
   ```
   ```php
   $user = App\Models\User::where('email', 'your-email@example.com')->first();
   $user->role = 'admin';
   $user->save();
   exit
   ```

### Masalah: Tidak Di-redirect ke /admin Setelah Login
**Penyebab**: Redirect logic belum bekerja

**Solusi**:
1. Clear cache:
   ```bash
   php artisan cache:clear
   php artisan config:clear
   php artisan route:clear
   ```
2. Pastikan user memiliki role 'admin'
3. Coba logout dan login lagi

### Masalah: Halaman Kosong / Blank
**Penyebab**: Error di frontend atau route tidak ditemukan

**Solusi**:
1. Cek console browser untuk error
2. Pastikan build frontend sudah dijalankan:
   ```bash
   npm run dev
   # atau
   npm run build
   ```
3. Cek route dengan: `php artisan route:list --path=admin`

---

## 🛠️ Command yang Berguna

### Cek Admin Users
```bash
php artisan admin:check
```

### Buat Admin User Baru
```bash
php artisan admin:check --fix
```

### Cek Route Admin
```bash
php artisan route:list --path=admin
```

### Clear Cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
```

---

## 📝 Catatan

- Admin panel hanya bisa diakses oleh user dengan role `'admin'`
- URL admin: `/admin`
- Tidak ada link/button di tampilan public untuk akses admin (harus ketik langsung)
- Setelah login sebagai admin, akan otomatis di-redirect ke `/admin`

---

**Last Updated**: 2025-01-XX

