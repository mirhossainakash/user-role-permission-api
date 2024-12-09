# User Role Permission API

This is a Laravel-based RESTful API for managing users, roles, and permissions. It includes secure authentication using Laravel Passport and adheres to PSR coding standards for clean and maintainable code.

---

## 🚀 Features

- **User Management**: Assign multiple roles and permissions to users.
- **Role Management**: Assign multiple permissions to roles.
- **Middleware Authorization**: Ensure secure access to routes based on permissions.
- **Token-Based Authentication**: Implemented using Laravel Passport.
- **Repository Pattern**: For scalable and testable architecture.

---


## Project Directory Structure

├── app
│   ├── Console
│   ├── Exceptions
│   ├── Http
│   │   ├── Controllers
│   │   │   ├── AuthController.php
│   │   │   ├── UserController.php
│   │   │   ├── RoleController.php
│   │   │   └── PermissionController.php
│   │   ├── Middleware
│   │   │   └── PermissionMiddleware.php
│   ├── Models
│   │   ├── User.php
│   │   ├── Role.php
│   │   └── Permission.php
│   ├── Providers
│   │   └── AppServiceProvider.php
├── config
│   ├── app.php
│   └── auth.php
├── database
│   ├── migrations
│   │   ├── xxxx_xx_xx_create_users_table.php
│   │   ├── xxxx_xx_xx_create_roles_table.php
│   │   ├── xxxx_xx_xx_create_permissions_table.php
│   │   ├── xxxx_xx_xx_create_role_user_table.php
│   │   └── xxxx_xx_xx_create_permission_user_table.php
│   └── seeders
│       ├── DatabaseSeeder.php
│       └── RolesAndPermissionsSeeder.php
├── public
│   ├── index.php
├── routes
│   ├── api.php
├── tests
│   ├── Feature
│   │   └── ExampleTest.php
│   ├── Unit
│       └── ExampleTest.php
├── storage
├── vendor
├── .env
├── composer.json
├── package.json
├── PostmanCollection.json
└── README.md


## 🛠️ Installation Guide

### Prerequisites

Ensure you have the following installed:
- **PHP** (>= 8.0)
- **Composer** (latest)
- **Laravel** (>= 10.x)
- **MySQL** or any other database supported by Laravel
- **Node.js** and **npm/yarn** (for frontend or asset compilation, if applicable)

---

### Steps to Install and Run

1. Clone the repository:
    git clone https://github.com/mirhossainakash/user-role-permission-api.git
    cd user-role-permission-api

2. Install dependencies:
    composer install

3. Set up the environment file:
    Copy .env.example to .env and update the database credentials:
    cp .env.example .env

4. Generate the application key:
    php artisan key:generate

5. Migrate and seed the database:
    php artisan migrate --seed

6. Install Laravel Passport:
    php artisan passport:install

7. Start the server:
    php artisan serve
