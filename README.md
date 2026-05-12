# Blog Management System — JobYaari PHP/Laravel Assessment

A full-stack Blog Management System built with **Laravel 10**, **MySQL**, **Bootstrap 5**, and **jQuery/AJAX**.

---

## 🔗 Submission Links
- **GitHub Repo:** *(add your repo link here)*
- **Live Website:** *(add your live URL here)*
- **Admin Panel URL:** `[live-url]/admin/login`
- **Admin Email:** `admin@blog.com`
- **Admin Password:** `Admin@1234`

---

## ✅ Features

### User Side
- All blogs dynamically fetched from MySQL (no static HTML)
- Responsive blog listing page (Bootstrap 5 — mobile + desktop)
- Blog detail page with full rich-text content
- AJAX search by keyword — no page reload
- AJAX filter by Category (Admit Card, Result, Answer Key, etc.)
- AJAX filter by Date — no page reload

### Admin Panel (`/admin`)
- Secure session-based login/logout
- Dashboard with stats (total blogs, categories, today's count)
- Add blog with TinyMCE rich-text editor (headings, bold, images, tables, lists)
- Edit existing blog
- Delete blog with confirmation
- Image upload with preview
- Publish date auto-generated (no manual input)

---

## 🛠 Tech Stack

| Layer | Technology |
|---|---|
| Language | PHP 8.1+ |
| Framework | Laravel 10 |
| Database | MySQL |
| Frontend | HTML5, CSS3, Bootstrap 5.3 |
| JavaScript | jQuery 3.7, AJAX |
| Rich Text Editor | TinyMCE 6 (free CDN) |
| Auth | Custom session-based |

---

## 🚀 Local Setup (XAMPP)

```bash
# 1. Install XAMPP: https://www.apachefriends.org
# 2. Install Composer: https://getcomposer.org
# 3. Open CMD and go to htdocs
cd C:\xampp\htdocs

# 4. Create Laravel project
composer create-project laravel/laravel blog-system
cd blog-system

# 5. Copy all project files into this folder

# 6. Create .env from example
copy .env.example .env

# 7. Generate app key
php artisan key:generate

# 8. Create MySQL database named "blog_system" in phpMyAdmin
#    then update .env:
#    DB_DATABASE=blog_system
#    DB_USERNAME=root
#    DB_PASSWORD=

# 9. Run migrations and seed sample data
php artisan migrate --seed

# 10. Create storage symlink
php artisan storage:link

# 11. Start server
php artisan serve

# Visit: http://localhost:8000
# Admin: http://localhost:8000/admin/login
```

---

## 🌐 Free Deployment (InfinityFree)

1. Sign up at https://infinityfree.com (free)
2. Create hosting account → note DB host, name, username, password
3. Update `.env` with live DB credentials
4. Run `composer install --no-dev --optimize-autoloader`
5. Upload all files via FileZilla FTP to `htdocs/`
6. Import DB via their phpMyAdmin panel
7. Set document root to `public/` folder

---

## 📁 Project Structure

```
app/
  Http/
    Controllers/
      BlogController.php          ← Public blog listing + AJAX filter
      Admin/
        AuthController.php        ← Admin login/logout
        BlogController.php        ← Admin CRUD (add/edit/delete)
    Middleware/
      AdminAuth.php               ← Protects admin routes
  Models/
    Blog.php
    Admin.php
database/
  migrations/
  seeders/
    AdminSeeder.php               ← Creates admin@blog.com / Admin@1234
    BlogSeeder.php                ← Creates 12 sample blogs
resources/views/
  layouts/
    app.blade.php                 ← Public layout
    admin.blade.php               ← Admin layout
  blogs/
    index.blade.php               ← Blog listing with AJAX filters
    show.blade.php                ← Blog detail page
    partials/blog-cards.blade.php ← Cards partial returned by AJAX
  admin/
    login.blade.php
    dashboard.blade.php
    blogs/
      index.blade.php
      create.blade.php
      edit.blade.php
public/
  css/style.css
  js/blog-filter.js
routes/
  web.php
```

---

## 🔐 Admin Credentials
- **URL:** `/admin/login`
- **Email:** `admin@blog.com`
- **Password:** `Admin@1234`
