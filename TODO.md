# Student System Role-Based Auth Implementation TODO

## Approved Plan Steps (to be checked off as completed):

### 1. Fix Models/Seeders ✅
- [x] app/Models/User.php: Add 'role' to fillable
- [x] database/seeders/DatabaseSeeder.php: Call UserSeeder
- [x] Run `php artisan migrate:fresh --seed` (after all changes)

**Current Step: 2. Register Middleware**

### 2. Register Middleware ✅
- [x] bootstrap/app.php: Register 'admin' middleware alias

### 3. Update Student Migration (if needed) ✅
- [x] Check/add fields to students table (name, email, age)

**Current Step: 4. Implement StudentController**

### 4. Implement StudentController with Role Checks ✅
- [x] Add logic: admin full CRUD, teacher view/edit, student view limited
- [x] Methods: index (all), create/store/edit/update/destroy with checks

**Current Step: 6. Create Views**

### 5. Setup Routes ✅
- [x] routes/web.php: Add protected student resource routes with middleware

### 6. Create Views ✅
- [x] students/index.blade.php (list)
- [x] students/create.blade.php
- [x] students/edit.blade.php
- [x] students/show.blade.php

### 7. Enhance Dashboard & Register
- [ ] dashboard.blade.php: Show role, role-based links
- [ ] auth/register.blade.php: Add role select

### 8. Testing
- [ ] `php artisan migrate:fresh --seed`
- [ ] `npm run dev && php artisan serve`
- [ ] Test logins/CRUDS/403 errors for all roles

**Current Step: Starting with 1. Models/Seeders**
