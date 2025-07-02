
---

````markdown
# Laravel 12 Project - WEBSITE Multi-Domain

Proyek ini adalah sistem dashboard berbasis Laravel 12 yang telah terintegrasi dengan:

- Tailwind CSS (dengan auto reload via Vite)
- Autentikasi (Login/Logout)
- Middleware Auth dan Custom Redirect
- Routing berbasis Multi-domain (Subdomain)
- Database MySQL
- Support Nginx / Apache untuk multi-domain lokal

---

### Install Dependency

```bash
composer install
npm install && npm run dev
```

### Setup Environment

Salin file `.env`:

```bash
cp .env.example .env
```

Lalu ubah konfigurasi berikut di `.env`:

```env
APP_NAME="Dashboard"
APP_URL=http://dashboard.test

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=namadb
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Key dan Migrate

```bash
php artisan key:generate
php artisan migrate
```

---

## Konfigurasi Multi-Domain Lokal

### 1. Edit File Hosts

Tambahkan baris berikut ke `C:\Windows\System32\drivers\etc\hosts` (Windows) atau `/etc/hosts` (Linux/macOS):

```

C:\Windows\System32\drivers\etc\hosts
127.0.0.1      cendanasolution.test
127.0.0.1      pustakapemda.test
127.0.0.1      pspi.test
127.0.0.1      dashboard.test

```

### 2. Konfigurasi Nginx (contoh di Laragon)

```nginx
server {
    listen 80;
    server_name dashboard.test;
    root "C:/laragon/www/nama-folder-public/public";

    index index.php index.html;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass php_upstream;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

### 3. Konfigurasi Apache (Virtual Host)

```apache
<VirtualHost *:80>
    ServerName dashboard.test
    DocumentRoot "C:/laragon/www/nama-folder-public/public"

    <Directory "C:/laragon/www/nama-folder-public/public">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

Setelah itu, **restart Apache/Nginx**.

---

## Tailwind CSS + Auto Reload

* Tailwind sudah terpasang dengan Vite.
* Jalankan dev server:

```bash
npm run dev #AGAR AUTO RELOAD
```

File penting:

* `vite.config.js`
* `tailwind.config.js`
* `resources/css/app.css`
* `layouts/nama website.blade.php` sudah include CSS-nya.

---

---

## Struktur Penting

* `routes/web.php` ? Routing domain dan auth
* `app/Http/Controllers/AuthController.php` ? Login & Logout logic
* `resources/views/admin/auth/login.blade.php` ? Halaman login
* `resources/views/admin/dashboard.blade.php` ? Halaman dashboard
* `resources/views/layouts/app.blade.php` ? Layout utama

---

## Testing

Akses login: `http://dashboard.test/auth/login` jalankan db seedernya dulu agar bisa login ke dashboardnya
Akses CSC: `http://cendanasolution.test`
Akses CSC: `http://pspi.test`
Akses CSC: `http://pustakapemda.test`
Login ? redirect ke: `http://dashboard.test/dashboard`
Akses `/dashboard` tanpa login ? redirect ke login
Akses `/auth/login` saat sudah login ? redirect ke dashboard

---

