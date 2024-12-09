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


### Tesating with Postman 

1. Authenticate with Laravel Passport

To interact with protected endpoints, you'll need to authenticate using Laravel Passport:
Generate a Token

    Add a POST request to your collection.
    Set the URL:

http://127.0.0.1:8000/api/login

Go to the Body tab, select raw, and set the content type to JSON. Add the following JSON:

    {
        "email": "your_email@example.com",
        "password": "your_password"
    }

    Click Send.
        If successful, the response will contain an access token (e.g., Bearer abc123xyz).

Save the Token for Future Requests

    Copy the access_token from the response.
    Go to your collection settings and add a Variable:
        Variable: token
        Initial Value: Bearer abc123xyz (replace with your token).
    For all subsequent requests, use this token for authentication.

2. Test Endpoints
Example: Testing the User CRUD Endpoints

    GET All Users
        URL:

http://127.0.0.1:8000/api/users

Method: GET
Go to the Headers tab and add:

    Authorization: {{token}}

    Click Send to view all users.

GET a Specific User

    URL:

    http://127.0.0.1:8000/api/users/{id}

    Replace {id} with the user ID (e.g., http://127.0.0.1:8000/api/users/1).
    Use the same Authorization header.

Create a User

    URL:

http://127.0.0.1:8000/api/users

Method: POST
Body:

    {
        "name": "John Doe",
        "email": "john@example.com",
        "password": "password",
        "roles": [1, 2]
    }

    Add Authorization header and click Send.

Update a User

    URL:

http://127.0.0.1:8000/api/users/{id}

Method: PUT
Body:

    {
        "name": "John Updated",
        "email": "john_updated@example.com",
        "roles": [1]
    }

    Add Authorization header and click Send.

Delete a User

    URL:

        http://127.0.0.1:8000/api/users/{id}

        Method: DELETE
        Add Authorization header and click Send.

3. Testing Roles and Permissions
Roles:

    Create Role:
        URL: http://127.0.0.1:8000/api/roles
        Method: POST
        Body:

    {
        "name": "Admin"
    }

Assign Role to User:

    URL: http://127.0.0.1:8000/api/users/{id}/roles
    Method: POST
    Body:

        {
            "roles": [1]
        }

Permissions:

    Create Permission:
        URL: http://127.0.0.1:8000/api/permissions
        Method: POST
        Body:

    {
        "name": "edit_users"
    }

Assign Permission to Role:

    URL: http://127.0.0.1:8000/api/roles/{id}/permissions
    Method: POST
    Body:

        {
            "permissions": [1]
        }


