Task Management API
A RESTful API for task management built with Laravel 12 and Laravel Sanctum for authentication.

📋 Table of Contents
Features

Tech Stack

Prerequisites

Installation

Configuration

API Documentation

Testing




🚀 Features
User Authentication (Register, Login, Logout)

Task CRUD Operations (Create, Read, Update, Delete)

Task Filtering by status (Pending, In Progress, Completed)

Pagination for task lists

API Token Authentication using Laravel Sanctum

Form Request Validation

Comprehensive Error Handling

🛠️ Tech Stack
Backend: Laravel 12

Authentication: Laravel Sanctum

Database: MySQL
s
Validation: Laravel Form Requests

📋 Prerequisites
Before you begin, ensure you have met the following requirements:

PHP 8.2+

Composer

MySQL 5.7+ or MariaDB

Web Server (Apache/Nginx) or PHP Built-in Server

Git

🛠️ Installation
Step 1: Clone the Repository

Step 2: Install PHP Dependencies
cmd: composer install

Step 3: Environment Configuration
# Copy environment file
cp .env.example .env

# Generate application key
cmd: php artisan key:generate

Step 4: Database Setup
Create a MySQL database for the project

Update your .env file with database credentials:

.env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=taskproject
DB_USERNAME=your_username
DB_PASSWORD=your_password

Step 5: Run Migrations
bash

# Install Laravel Sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"

# Run database migrations
php artisan migrate

Step 6: Serve the Application

php artisan serve
Application will be available at: http://localhost:8000

markdown
# Task Management API

A RESTful API for task management built with Laravel 12 and Laravel Sanctum authentication.

## 🚀 Features

- User Authentication (Register, Login, Logout)
- Task CRUD Operations
- Task Filtering & Pagination
- API Token Authentication
- Comprehensive Testing

## 📋 Requirements

- PHP 8.2+
- Composer
- MySQL 5.7+

📚 API Documentation
Authentication
POST /api/auth/register - Register user

POST /api/auth/login - Login user

POST /api/auth/logout - Logout user

Tasks
GET /api/tasks - Get user's tasks

POST /api/tasks - Create new task

PUT /api/tasks/{id} - Update task

DELETE /api/tasks/{id} - Delete task



