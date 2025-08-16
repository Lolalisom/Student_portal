
# Student Portal — Neon UI (Laravel Overlay)

Overlay for a fresh **Laravel 11** app with **Laravel Breeze (Blade)**.

## Quick start
```bash
composer create-project laravel/laravel student-portal
cd student-portal
composer require laravel/breeze --dev
php artisan breeze:install blade
npm install
cp .env.example .env
php artisan key:generate
# set DB in .env
```
Now extract this ZIP over the project (overwrite).
```bash
php artisan storage:link
php artisan migrate --seed
npm run dev
php artisan serve
```
Logins:
- admin@example.com / password
- student@example.com / password

## Features
- Role-based auth (admin/teacher, student)
- Student dashboard: view/edit profile (basic fields), see assignments, results, messages
- Admin dashboard: CRUD students, create assignments, view/grade submissions, publish results, messaging
- File uploads: assignments & submissions (uses `storage:link`)
- Neon Tailwind theme (dark + glow)
