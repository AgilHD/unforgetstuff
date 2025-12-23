# 🔧 Solusi: Tidak Bisa Login ke Panel Admin

## 🔍 Diagnosa Masalah

AdminMiddleware memeriksa apakah user memiliki `role === 'admin'`. Masalah biasanya terjadi karena:

1. ✅ User belum memiliki role 'admin'
2. ✅ AdminSeeder belum dijalankan
3. ✅ User yang dibuat manual tidak memiliki role 'admin'

---

## ✅ Solusi 1: Jalankan Seeder (Recommended)

Jika belum ada admin user di database, jalankan seeder:

```bash
php artisan db:seed --class=AdminSeeder
```

**Credential Admin:**
- Email: `admin@unforgetstuff.test`
- Password: `password`

Setelah itu, coba login dengan credential tersebut.

---

## ✅ Solusi 2: Update User Existing ke Admin

Jika sudah ada user tapi tidak bisa login ke admin, update role user tersebut:

### Via Tinker:
```bash
php artisan tinker
```

Kemudian di tinker:
```php
$user = App\Models\User::where('email', 'your-email@example.com')->first();
$user->role = 'admin';
$user->save();
exit
```

### Via SQL (jika menggunakan SQLite):
```bash
sqlite3 database/database.sqlite
```

Kemudian:
```sql
UPDATE users SET role = 'admin' WHERE email = 'your-email@example.com';
.exit
```

---

## ✅ Solusi 3: Buat Admin User Baru

Buat admin user baru via tinker:

```bash
php artisan tinker
```

Kemudian:
```php
App\Models\User::create([
    'name' => 'Admin',
    'email' => 'admin@example.com',
    'password' => Hash::make('password'),
    'role' => 'admin',
]);
exit
```

---

## ✅ Solusi 4: Pastikan Migration Sudah Di-Run

Pastikan migration untuk kolom `role` sudah dijalankan:

```bash
php artisan migrate
```

Jika ada error, coba:
```bash
php artisan migrate:fresh --seed
```

**⚠️ WARNING:** `migrate:fresh` akan menghapus semua data!

---

## 🔍 Cek Status User

Untuk mengecek user yang ada di database, buat file temporary:

```bash
php artisan make:command CheckUsers
```

Atau langsung via tinker (cara sederhana):

```bash
php artisan tinker
```

```php
App\Models\User::all(['id', 'name', 'email', 'role'])->each(function($user) {
    echo "ID: {$user->id} | Name: {$user->name} | Email: {$user->email} | Role: " . ($user->role ?? 'NULL') . PHP_EOL;
});
exit
```

---

## 🎯 Quick Fix (All-in-One)

Jalankan command berikut untuk fix semua sekaligus:

```bash
# 1. Pastikan migration sudah di-run
php artisan migrate

# 2. Seed admin user
php artisan db:seed --class=AdminSeeder

# 3. Clear cache
php artisan cache:clear
php artisan config:clear
```

Kemudian login dengan:
- **Email:** `admin@unforgetstuff.test`
- **Password:** `password`

---

## 🐛 Debug: Cek Apakah Middleware Bekerja

Untuk debug, tambahkan logging di `AdminMiddleware.php`:

```php
public function handle(Request $request, Closure $next): Response
{
    $user = $request->user();
    
    // Debug logging
    \Log::info('Admin Middleware Check', [
        'user_id' => $user?->id,
        'user_email' => $user?->email,
        'user_role' => $user?->role,
        'is_admin' => $user?->role === 'admin',
    ]);

    if (! $user || $user->role !== 'admin') {
        abort(403);
    }

    return $next($request);
}
```

Kemudian cek log:
```bash
tail -f storage/logs/laravel.log
```

---

## 📝 Checklist

- [ ] Migration sudah di-run (`php artisan migrate`)
- [ ] AdminSeeder sudah dijalankan (`php artisan db:seed --class=AdminSeeder`)
- [ ] User memiliki role 'admin' (cek di database)
- [ ] Cache sudah di-clear (`php artisan cache:clear`)
- [ ] Login dengan email dan password yang benar

---

## 💡 Tips

1. **Gunakan route `/whoami` untuk cek user yang sedang login:**
   - Akses: `http://localhost/whoami` (setelah login)
   - Akan menampilkan data user yang sedang login

2. **Pastikan email dan password benar:**
   - Email: case-sensitive
   - Password: harus sesuai dengan yang di-hash di database

3. **Jika masih error 403:**
   - Pastikan user benar-benar memiliki role 'admin' (bukan 'Admin' atau 'ADMIN')
   - Role harus lowercase: `'admin'`

---

Jika masih bermasalah setelah mencoba semua solusi di atas, cek:
- Apakah ada error di `storage/logs/laravel.log`
- Apakah middleware 'admin' sudah terdaftar di `bootstrap/app.php`
- Apakah route admin menggunakan middleware yang benar

