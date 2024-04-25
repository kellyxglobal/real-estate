<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# BREAKDOWN OF MY REALESTATE BACKEND PROJECT DEVELOPED WITH LARAVEL

I wish to provide a comprehensive walkthrough of my real estate project's development.  This breakdown can serve as a valuable resource for anyone building a similar multi-user authentication system and other RealEstate features with PHP, MySQL and Laravel.

My detailed explanation showcases a clear understanding of the steps involved in building a multi-user authentication system with Laravel and Blade templating for this project. Here are some additional points and insights based on my breakdown:

## Strengths:

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

## Blade Templating for Dynamic Views

I employed Laravel's Blade templating engine to construct dynamic web pages. Blade templates provide a clean way to separate application logic from presentation and allow for code reusability. I utilized concepts like inheritance and sections within Blade templates to create a consistent layout for the application's various views (admin dashboard, user dashboard, etc.).

## Developing The Admin Dashboard

I constructed a dedicated admin dashboard with distinct components like header, sidebar, and footer. Each component was created as a separate Blade template file (header.blade.php, sidebar.blade.php, footer.blade.php) for better organization and maintainability. I then integrated these components into the main admin dashboard template using Blade's include directive.

## Admin Profile Management & Updation

I implemented functionalities for admin profile management, allowing admins to view and update their profile information (name, email, profile picture). This involved creating a specific route for accessing the admin profile page and crafting a dedicated controller method to retrieve the authenticated admin's user data. I utilized Blade templating to display the retrieved data within the profile view and incorporated forms to facilitate user data updates.

## User Dashboard & Profile Management

Similar to the admin section, I built a user dashboard with profile editing capabilities. The user dashboard utilizes Blade templates and retrieves user data for display. Forms are included within the user profile view to allow users to modify their information, mimicking the functionalities implemented for the admin profile section.

## Frontend Theme Integration & Customization

I integrated a pre-built frontend theme into the project to enhance the user interface. This involved incorporating the theme's assets (CSS, JavaScript) and customizing specific frontend pages like login, registration, and user dashboard. I utilized Blade templating to dynamically inject content and ensure proper asset loading.

## Conditional Login/Logout Button Display

I implemented a dynamic login/logout button within the application's header section. By leveraging Laravel's @auth directive, the button text and functionality change based on the user's authentication status. When a user is logged in, the button displays "Logout" and redirects to the logout functionality upon clicking. Conversely, for unauthenticated users, the button displays "Sign In" and redirects to the login page.

## User Login & Logout Notification

I incorporated user login and logout notifications to enhance the user experience. I modified the UserAuthenticatedController.php file to trigger notifications upon successful login and logout events, providing feedback to the user regarding their authentication status.


# Professional Breakdown of Property Type Feature in Admin Panel

In real estate, the term "property type" refers to the category or classification of a piece of real property based on its characteristics, purpose, and usage. Property types can vary widely and may include residential, commercial, industrial, agricultural, or vacant land, among others. Each property type has its own set of features, potential uses, and market dynamics, which can influence factors such as valuation, investment potential, and regulatory considerations.

## Implementing Property Type Feature:

This section details the development of a property type management system within the project's admin panel.

## Database and Model Setup:

1) Property Type Model and Migration: The php artisan make:model PropertyType -m command was utilized to generate a PropertyType model class and its corresponding migration table. The model was further configured to allow mass assignment using the fillable property.
2) Property Type Migration: The migration schema defined two columns: property_name (string) and property_icon (string) to store the property type name and its associated icon path.
3) Database Migration: The php artisan migrate command was executed to create the property_types table in the database with the specified columns.

## Controller and Route Configuration:

1) PropertyTypeController: The php artisan make:controller PropertyTypeController command was used to generate a dedicated controller class to handle property type functionalities.
2) Route Definition: The web.php route file was updated to include routes for the PropertyTypeController methods. This involved defining URLs for viewing all property types and adding new ones.
3) Admin Middleware: To restrict access to these routes, a custom admin middleware group was created by copying the existing admin middleware. Subsequently, a group controller was defined within the middleware to exclusively handle PropertyTypeController routes.

## Admin Panel Integration:

1) Admin Sidebar Menu: The admin sidebar component view was modified to incorporate two new menu options: one for viewing all property types and another for adding new ones.
2) View Creation: A new folder named view/backend/type/ was created to house Blade template files specific to property type management. The all_type.blade.php file was developed within this folder to display a list of all property types using a Data Table (presumably copied from the project's theme templates).
3) Asset Management: The {{ asset(backend/assets/...) }} helper was used within the admin_dashboard.blade.php file to include the necessary CSS and JavaScript files required for the property type feature functionality.

## Adding Property Types:

1) Add Property Type Route: A route was defined in web.php to handle form submissions from the all_type view. This route triggered the AddType method within the PropertyTypeController.
2) Add Type View: The add_type.blade.php view was created to display a form containing fields for property type name and icon selection.
3) Store Property Type: Another route (store_type) was established in web.php to handle form submissions for adding new property types. The corresponding storeType method was defined in the PropertyTypeController to process the submitted data and potentially store it in the database.

## Editing Existing Property Types:

1) Edit Property Type Link: The all_type.blade.php view was modified to include a link (potentially an anchor tag) for editing existing property types. This link essentially represents a route definition.
2) Edit and Update Routes: Routes for EditType and UpdateType methods were defined in web.php to handle edit requests and potentially update property type information.
3) Edit Type View: The edit_type.blade.php view was created to display a form pre-populated with the existing data of the chosen property type (fetched using the ID from the route). The form action attribute was set to the UpdateType route for processing updates.


# Implementing Amenities Feature:

The development process for the amenities feature mirrors the steps outlined in section 33 for property types. It likely involves creating a separate Amenity model with its migration, controller, routes, views, and potentially linking it to the PropertyType model for establishing relationships between property types and their associated amenities.

This breakdown provides a more professional and organized explanation of the property type feature development process within your Laravel real estate project.