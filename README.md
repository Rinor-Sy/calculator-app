# Laravel Project Setup with Laravel Breeze

## Introduction

This README file provides a step-by-step guide for setting up a Laravel project using Laravel Breeze. Laravel Breeze is a minimal starter kit for Laravel that includes authentication scaffolding, making it easy to get started with user registration, login, and password reset functionality.

**Project Details:**
- Laravel Version: 10.x
- PHP Version: 8.1
- Laravel Breeze Version: Latest (Please refer to the [official Laravel Breeze documentation](https://laravel.com/docs/10.x/starter-kits#laravel-breeze) for the latest version information)

## Prerequisites

Before you begin the installation process, ensure that you have the following prerequisites installed on your machine:

- PHP 8.1
- Composer
- Node.js and npm
- Laravel Installer

## Installation Steps

1. **Clone the Repository:**

   Clone the repository to your local machine using the following command:

   ```bash
   git clone https://github.com/Rinor-Sy/calculator-app.git

2. **Install Dependencies:** Navigate to the project directory and install PHP dependencies using Composer:

    ```bash
    cd calculator-app
    composer install
    npm install

3. **Configure Environment:**
   *Update the .env file with your database connection details and other configuration settings.*
    
    ```bash
    cp .env.example .env
    php artisan key:generate

4. **Run Migrations:**
    ```bash
    php artisan migrate

5. **Install Frontend Assets:**
    ```bash
    npm run dev

6. **Start the Development Server:**
    ```bash
   php artisan serve
Visit http://localhost:8000 in your browser to see your Laravel Breeze project.

