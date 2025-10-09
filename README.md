# 🧭 Vuexy Admin Panel

A modern **Admin Panel** built with the **Vuexy Frontend Template**, featuring full **authentication**, **authorization**, and **role-based access control** powered by **Spatie Laravel Permission**.

---

## ✨ Features

- 🎨 **Vuexy Template Integration**
  - Beautiful, responsive, and feature-rich design
  - Supports **Dark Mode**
  - Fully customizable **Sidebar**

- 🔐 **Authentication & Authorization**
  - Secure login and registration
  - Role-based access control with **Spatie**
  - Permissions management (create, edit, delete roles)

- 👥 **User Management**
  - User CRUD operations
  - Profile management with **image upload**
  - Role assignment and permission configuration

- 🧑‍💼 **Admin Section**
  - Admin dashboard with overview metrics
  - Manage users, roles, and permissions

- 👤 **User Section**
  - Personalized dashboard
  - Profile editing and avatar upload

---
## 🖼️ Screenshots
![screenshot](https://i.ibb.co/whs6rRd7/Screenshot-2025-10-09-at-7-01-07-PM.png)

![screenshot](https://i.ibb.co/849w6V0j/Screenshot-2025-10-09-at-7-02-48-PM.png)
---

## 🏗️ Tech Stack

| Layer | Technology |
|-------|-------------|
| Frontend | [Vuexy Admin Template](https://themeforest.net/item/vuexy-vuejs-html-laravel-admin-dashboard-template/23328599) |
| Backend | Laravel / PHP |
| Permissions | [Spatie Laravel Permission](https://spatie.be/docs/laravel-permission) |
| Database | MySQL |
| UI Theme | Bootstrap 5 + Vuexy Components |

---

## ⚙️ Installation

```bash
# 1️⃣ Clone the repository
git clone https://github.com/safwat866/social-auth-login.git

# 2️⃣ Navigate into the project
cd social-auth-login

# 3️⃣ Install dependencies
composer install
npm install && npm run dev

# 4️⃣ Set up environment variables
cp .env.example .env
php artisan key:generate

# 5️⃣ Configure your database in .env
php artisan migrate --seed
php artisan storage:link

# 6️⃣ Serve the application
php artisan serve

```

-- 

## 🔧 setup

#### email: admin@admin.com
#### password: password