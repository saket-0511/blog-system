# ⚡ Quick Setup Guide

## Step 1 — Install Required Software (one-time only)

| Software | Download | Purpose |
|---|---|---|
| XAMPP | https://www.apachefriends.org | PHP + MySQL + Apache |
| Composer | https://getcomposer.org/Composer-Setup.exe | Install Laravel packages |
| VS Code | https://code.visualstudio.com | Code editor |

After installing XAMPP: open XAMPP Control Panel → Start Apache and MySQL.

---

## Step 2 — Set Up the Project

Open **Command Prompt** (Windows key + R → type `cmd` → Enter):

```
cd C:\xampp\htdocs
composer create-project laravel/laravel blog-system
```

Now **copy all the files from this ZIP** into `C:\xampp\htdocs\blog-system\`
(Replace/overwrite existing files when prompted)

---

## Step 3 — Create Database

1. Open browser → go to `http://localhost/phpmyadmin`
2. Click **New** on the left
3. Type `blog_system` → click **Create**

---

## Step 4 — Configure .env

In the `blog-system` folder, open `.env.example`, rename it to `.env`.

Make sure these lines are set:
```
DB_DATABASE=blog_system
DB_USERNAME=root
DB_PASSWORD=
```

---

## Step 5 — Run Commands

Open CMD inside the `blog-system` folder:

```
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

---

## Step 6 — Open in Browser

- **Website:** http://localhost:8000
- **Admin Panel:** http://localhost:8000/admin/login
- **Email:** admin@blog.com
- **Password:** Admin@1234

---

## ✅ That's it! Your project is running.
