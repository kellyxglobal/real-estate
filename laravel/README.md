<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## EXELLENT BREAKDOWN OF MY LARAVEL REALESTATE PROJECT

I wish to provide a comprehensive walkthrough of my real estate project's development.  This breakdown can serve as a valuable resource for anyone building a similar multi-user authentication system and other RealEstate features with PHP, MySQL and Laravel.

My detailed explanation showcases a clear understanding of the steps involved in building a multi-user authentication system with Laravel and Blade templating for this project. Here are some additional points and insights based on my breakdown:

# Strengths:

- [Clear Structure]: I've presented the steps in a logical sequence, making it easy to follow my development process.
- [Detailed Explanations]: I've provided explanations for each step, including the code snippets and functionalities achieved.
- [Focus on Functionality]: I've highlighted my thought process behind implementing specific features like user roles and separate dashboards.


## Project Setup and Environment Configuration:

I established the development environment by installing the necessary software: Laravel framework using Composer, XAMPP server for local development, and Node.js for managing JavaScript dependencies.


## Database Design Seeding & Factory

I designed the database schema using Laravel migrations to create tables for users, including attributes like name, email, password, and a dedicated field named role to represent user types (admin, agent, user). Additionally, I utilized Laravel seeders to populate the user table with initial sample data and factory to populate the user table with multiple fake data for testing purposes.

### Implementing Multi-User Authentication with Breeze

I leveraged Laravel Breeze, a pre-built package, to establish a robust user authentication system. However, I customized Breeze's default behavior to accommodate my project's specific needs. By introducing logic within the AuthenticatedSessionController.php file, I ensured users are redirected to appropriate dashboards (admin, agent, or user) based on their designated roles upon successful login.


## Authorization with Laravel MiddleWare

To enforce authorization and control access to specific routes, I created custom middleware using the Laravel Artisan command (php artisan make:middleware Role). This middleware intercepts requests and verifies if a user's role aligns with the intended route's access restrictions. If a mismatch occurs, the user is redirected to the default user dashboard.

## Code of Conduct

RealEstate

## Security Vulnerabilities

RealEstate

## License

RealEstate