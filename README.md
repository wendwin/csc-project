



Laravel 12 Project - WEBSITE Multi-Domain

Proyek ini adalah sistem website berbasis Laravel 12 yang telah terintegrasi dengan:

- Tailwind CSS (dengan auto reload via Vite)
- Autentikasi (Login/Logout)
- Middleware Auth dan Custom Redirect
- Routing berbasis Multi-domain (Subdomain)
- Database MySQL
- Support Nginx / Apache untuk multi-domain lokal


## 1. Install Dependency

```bash
composer install
npm install && npm run dev
````

---

## 2. Setup Environment

Salin file `.env`:

```bash
cp .env.example .env
```

Edit `.env`:

```env
APP_URL=http://dashboard.test #ganti dengan ini agar bisa rederch

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ppc_db
DB_USERNAME=root
DB_PASSWORD=
```

---

## 3. Generate Key & Migrate Database

```bash
php artisan key:generate
php artisan migrate
```

---

## 4. Konfigurasi Multi-Domain Lokal

### a. Edit File Hosts

Tambahkan baris berikut ke:

* **Windows**: `C:\Windows\System32\drivers\etc\hosts`
* **Linux/macOS**: `/etc/hosts`

```text
127.0.0.1      cendanasolution.test
127.0.0.1      pustakapemda.test
127.0.0.1      pspi.test
127.0.0.1      dashboard.test
```

---

### b. Konfigurasi Nginx (Contoh Laragon)

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

---

### c. Konfigurasi Apache (Virtual Host)

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

> Setelah itu, **restart Apache atau Nginx** agar konfigurasi berlaku.

---

## 5. Tailwind CSS + Auto Reload

* Tailwind sudah terpasang dengan Vite
* Jalankan dev server:

```bash
npm run dev
```

### File Terkait:

* `vite.config.js`
* `tailwind.config.js`
* `resources/css/app.css`
* `resources/views/layouts/[nama_website].blade.php` (sudah include CSS)

---

## 6. Struktur File Penting

* `routes/web.php` ? Routing domain dan autentikasi
* `app/Http/Controllers/AuthController.php` ? Logic login & logout
* `resources/views/admin/auth/login.blade.php` ? Halaman login
* `resources/views/admin/dashboard.blade.php` ? Halaman dashboard
* `resources/views/layouts/app.blade.php` ? Layout utama

---

## 7. Testing

Akses halaman:

* Login: `http://dashboard.test/auth/login`
  *(jalankan DB seeder dulu untuk login)*
* Dashboard: `http://dashboard.test/dashboard`
* CSC 1: `http://cendanasolution.test`
* CSC 2: `http://pspi.test`
* CSC 3: `http://pustakapemda.test`

### Logika Redirect:

* Akses `/dashboard` tanpa login ? redirect ke login
* Akses `/auth/login` saat sudah login ? redirect ke dashboard

---


