# Selaras.id – Platform Taaruf Digital Kemenag

Selaras.id adalah platform taaruf digital berbasis web yang dibuat untuk membantu proses pencarian pasangan secara lebih terarah, aman, dan sesuai nilai Islami.
Project ini dikembangkan sebagai sistem dengan role user, mediator, dan admin untuk memfasilitasi proses pengajuan taaruf secara terstruktur.

---

## 🚀 Features

- Authentication & Authorization
- Multi Role:
    - User
    - Mediator
    - Admin

- Pengajuan taaruf
- Accept / reject pengajuan
- Dashboard berbeda tiap role
- Manajemen profil pengguna
- Sistem mediator
- Responsive UI
- CRUD data pengguna
- Laravel MVC Architecture

---

## 🛠️ Tech Stack

- PHP
- Laravel
- Blade
- Tailwind CSS
- MySQL
- Laravel Breeze / Auth
- Eloquent ORM

---



## ⚙️ Installation

Clone repository:

```bash
git clone https://github.com/antarrizqi/Selaras.id-Kemenag.git
```

Masuk ke folder project:

```bash
cd Selaras.id-Kemenag
```

Install dependency:

```bash
composer install
```

Copy file environment:

```bash
cp .env.example .env
```

Generate app key:

```bash
php artisan key:generate
```

Atur database pada file `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=selaras
DB_USERNAME=root
DB_PASSWORD=
```

Migrasi database:

```bash
php artisan migrate
```

Jalankan server:

```bash
php artisan serve
```

---

## 👤 Demo Account

### Admin

```txt
Email    : admin@gmail.com
Password : 12345
```

### User

```txt
Email    : linda@gmail.com
Password : linda123
```

---

## 📂 Project Structure

```bash
app/
├── Http/
├── Models/
├── 

resources/
├── views/
├── css/

routes/
├── web.php

database/
├── migrations/
```

---

## 🎯 Main Goals

Project ini dibuat untuk:

- Membantu proses taaruf digital lebih modern
- Menjadi media penghubung antar pengguna
- Mempermudah pengelolaan data taaruf
- Mengurangi proses yang tidak terarah dalam pencarian pasangan

---

## 🔒 Roles Permission

| Role     | Access                             |
| -------- | ---------------------------------- |
| User     | Mengajukan taaruf & melihat status |
| Mediator | Memantau dan memediasi pengajuan   |
| Admin    | Mengelola seluruh sistem           |

---

## 📌 Future Improvements

- Realtime notification
- Chat mediator
- Matching recommendation system
- Email verification
- Upload dokumen pendukung
- Mobile responsive optimization

---

## 🤝 Contributing

Pull request dan kontribusi sangat terbuka.

Langkah kontribusi:

```bash
1. Fork repository
2. Create new branch
3. Commit changes
4. Push branch
5. Create pull request
```


---

## 👨‍💻 Developer

Developed by Antar rizqi

GitHub Repository:
[https://github.com/antarrizqi/Selaras.id-Kemenag](https://github.com/antarrizqi/Selaras.id-Kemenag)
