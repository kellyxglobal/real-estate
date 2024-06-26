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


# Buidling/Implementing Amenities Featurein the Admin Panel:
The development process for the amenities feature mirrors the steps outlined in the above section for property types. It likely involves creating a separate Amenity model with its migration, controller, routes, views, and potentially linking it to the PropertyType model for establishing relationships between property types and their associated amenities.

This breakdown provides a more professional and organized explanation of the property type feature development process within my Laravel real estate project.

## Adding Validation to the Amenities View:
- JavaScript Validation: To ensure users enter valid data when adding amenities, I included JavaScript validation. This involved copying a pre-built validation script (min.js) to My project's JavaScript folder (public/backend/assets/js/code).
- Script Import: The admin_dashboard.blade.php file was updated to import this validation script, ensuring it applies throughout the admin panel.
- Validation Integration: In the add_amenities.blade.php file, I added the validation script to the footer section. This ensures validation occurs when users submit the amenity creation form.

## Creating Menus and Routes for Amenities:
- Admin Sidebar Update: The admin sidebar menu was modified to include two new options: "All Amenities" and "Add Amenity." Each option has its unique link that directs users to the corresponding views.
- Route Definitions: In the web.php file, I defined specific routes for these new links. These routes are grouped under the PropertyTypeController routes for better organization.
- View Creation: Two new Blade template files were created: add_amenities.blade.php and all_amenities.blade.php. These files display the forms for adding new amenities and viewing existing ones, respectively.

## Adding and Managing Amenities:
- Storing Amenities: From the add_amenities.blade.php view, another route was defined to handle form submissions when adding new amenities. This route was mapped to a function within the PropertyTypeController.
- Database Storage: Using Laravel's Object-Relational Mapper (ORM) functions, the controller function inserts the submitted amenity data (name, etc.) into the database table for amenities. After successful insertion, the user is redirected to the view displaying all amenities.

## Editing and Deleting Amenities:
- Edit Links: Within the all_amenities.blade.php view, I created links for editing individual amenities. These links essentially represent routes pointing to specific controller methods.
- Edit Route and View: The web.php file was updated to define routes for editing amenities. These routes are linked to controller functions that retrieve existing amenity data based on the selected amenity and pass that data to the edit_amenities.blade.php view for editing.
- Updating Amenities: The edit_amenities.blade.php view contains a form for updating amenity details. The form's action attribute specifies a route for processing updates.
Database Update: The controller function associated with the update route utilizes Laravel's ORM to modify the corresponding amenity record in the database based on the submitted changes.
- Deleting Amenities: A similar approach was used for deleting amenities. Links were created in the all_amenities.blade.php view to trigger delete functionality. Routes and controller functions were defined to handle deletion requests and remove the chosen amenity from the database. Additionally, I implemented a "sweet alert" function to provide a user-friendly confirmation dialog before deleting an amenity.

# Building the Property Management System in the Admin Panel 

I outlined the development process below for managing properties within the project's admin panel.

## Creating Models and Migrations:
- Property Model and Migration: The php artisan make:model Property -m command was used to generate a Property model class and its corresponding migration table. The model was configured to allow mass assignment using the fillable property.
Property Attributes: The migration schema for the properties table likely included various attributes to describe a property, such as address, description, number of bedrooms, bathrooms, etc.
- Multi-Image Model and Migration: Recognizing that a property can have multiple images, I created a separate MultiImage model with its migration table using php artisan make:model MultiImage -m. This decision allows for storing individual image details for each property.
- Facility Model and Migration: To capture specific details about a property (e.g., HVAC systems, security features), I created a Facility model and its migration table using php artisan make:model Facility -m. This enables associating these facilities directly with each property in the database.
- Database Migration: Finally, the php artisan migrate command was executed to create all the defined tables (properties, multi_images, facilities) in the database.

## Setting Up Routes and Views:
- Admin Sidebar Update: The admin sidebar menu was expanded to include two new options: "Add Property" and "All Properties." These options provide quick access to functionalities for managing properties.
Property Controller: The php artisan make:controller Backend/PropertyController command was used to generate a dedicated controller class to handle property-related functionalities.
- Route Definitions: In the web.php file, routes were defined for both adding and viewing properties. These routes are grouped under the PropertyController for better organization.
- View Creation: Two new Blade template files were created: add_property.blade.php and all_properties.blade.php. These files provide the user interface components for adding new properties and displaying a list of existing properties, respectively.

## Initial Property Management Features:
- Add Property Functionality: The AddProperty method within the PropertyController is likely responsible for redirecting the user to the add_property.blade.php view, where a form allows entering property details.
- Model Usage: The PropertyController likely imports and utilizes the necessary models (Property, MultiImage, Facility) to facilitate property creation and potentially manage relationships between these models.

## Designing the Add Property Page:
This section describes the initial development phase for the "Add Property" page, where I focused on creating the user interface elements (presumably forms) for capturing property details.

Note:  Further development would likely involve implementing functionalities to handle form submissions, process property data, store it in the database (including managing multiple images and facilities), and potentially integrate functionalities for editing and deleting properties.


## Developing the "Add Property" Form

This stage involves designing the view for adding new properties, ensuring all relevant fields from the database are included.

- Data Population: The PropertyController retrieves data for properties, amenities, and agents through the AdProperty model functions. This data is then fetched from the database and passed to the form view for display.

- Enhanced Form Features: Additional fields have been incorporated into the form view, including long description, short description, featured property status, and hot property status.

- Facility Integration: Facility data is retrieved from the database and dynamically added to the property form. This functionality utilizes HTML and JavaScript to achieve the desired outcome. The form employs an array structure (Facility_name[] and distance[]) to capture user selections for facilities (e.g., hospital, supermarket, school) and their corresponding distances.

- Multiple Facility Support: To facilitate the addition of multiple facilities, a parent div element with hidden visibility is created. This element houses child div elements with class and ID attributes, enabling the addition and deletion of facilities within the form. Client-side validation of user input is implemented using a combination of HTML and JavaScript/Ajax scripting.

- "Add More" Functionality: An "Add More" button is included to dynamically add new facility sections within the form. Each button utilizes specific class attributes (addeventmore and removeeventmore) to trigger the corresponding JavaScript functions.


## Image Intervention Integration:
This section describes the integration of an image intervention package for advanced image manipulation tasks within the application. This package simplifies tasks like resizing, cropping, rotating, and watermarking images.

- Setup: The image intervention package was installed following the official documentation.

- Image Upload and Processing:
- - A route named StoreProperty was created based on the action attribute of the Add_Property form.
- - Inside the corresponding controller function, the uploaded image file is retrieved and stored in a variable.
- - The file extension is extracted and combined with a unique identifier generated programmatically.
- - The image resize function from the image intervention package is used to resize the image to desired dimensions and then save it to a designated directory.


## Database Insertion
This section details the process of inserting property data into the database.

- View Form: The submit property form was designed with specific attributes for capturing details like image thumbnail, multiple property images, property type, and selected amenities.
- - Arrays were used in the name attribute for amenity checkboxes to collect user selections.

- Eloquent ORM and Data Collection:
- - The Eloquent ORM was utilized within the controller function to efficiently target the selected amenity IDs.
- - The implode function in PHP is used to convert the selected amenity IDs into a comma-separated string for storage in the database table.

- Unique Property Code Generation:
- - The haruncpi/laravel-id-generator package was installed using composer require haruncpi/laravel-id-generator.
- - The IdGenerator class is included to facilitate the generation of unique property codes.

- Multiple Image Handling:
- - The controller method was extended to handle the insertion of multiple property images.

- Facility Attributes:
- - The insertion of facility attributes is also handled within the same controller method.


## Proper-Property Type Relationship:
This section outlines the implementation of the relationship between properties and their corresponding types.

- Edit Functionality:
- - The edit functionality allows users to click on a property's edit button, triggering a request to a specific web route.
- - This route utilizes a controller function to fetch all relevant property data and display it on the edit page.


## Property Status and Types Update:
This section describes the logic behind updating property status and property type information.

- Status Display:
- - The application displays "For Rent" when the property_status is "rent" and "For Buy" when it's "buy".

- Property Type Display:
- - The property name is displayed based on a match between the propertytype Id and the property Id.

- Amenity Display:
If all selected amenity IDs are present in the amenities array, their corresponding names are displayed.

- Agent Display:
- - If the property agent id matches the agent ID associated with the property, the agent's name is displayed.

- Featured and Hot Property Flags:
- - A checkbox is displayed for "featured" and "hot" properties based on the corresponding flag values ("1" for checked, otherwise unchecked).



## Updating Property Thumbnail:
This section explains the implementation of a separate form for updating the property thumbnail on the edit page.

- Dedicated Form:
A separate form is created on the edit_property page to handle thumbnail updates.
- Route and Function:
A specific route is defined for the form submission, and a controller function is implemented to handle the update logic for the submitted image file in the database.


## Advanced Image Management:

These sections detail functionalities related to managing multiple property images, including updating, deleting, and adding new images within the edit/update form.

- Setting Up and Updating Property Multi-Images
- Deleting Multi-Images from Edit/Update Form
- Adding New Images for Deleted Images
- Managing Property Update Facility
- Deleting Property and Removing Associated Images



## Property Details Page

This section details the creation of a dedicated page displaying detailed property information.


## Dockerizing the RealEstate Docker Application:
Docker is a game-changer for developers. It takes the hassle out of deploying applications by packaging them into standardized containers. These containers are lightweight and portable, ensuring your app runs smoothly on any machine with Docker.

Here, I'll walk you through the steps I took to Dockerize my Laravel real estate application. By following these steps, you can achieve the same benefits:

- Simplified Deployment: No more manual server configuration headaches! Docker guarantees consistent behavior across development, testing, and production environments.
- Reproducibility: My application runs identically on any machine with Docker, regardless of the underlying system.
- Isolation: Each container runs in its own world, preventing conflicts with other applications or dependencies on the host machine.

## Setting Up My Docker Environment (Windows Users):

First things first, I was on Windows, we needed to get Docker up and running. Here's what I did:

- Download and Install: Grab the Windows Subsystem for Linux (WSL)/Docker Desktop and install it on my machine. Then, on top of WSL, I installed Docker Desktop for Windows.

- Verify the Installation: Launch Docker Desktop and start the Docker Engine. Open a terminal window and type docker ps. If you see a list of containers, Docker is ready to roll!


## Creating the Docker Configuration Files:

I created the magic that tells Docker how to build and run my application by creating some files in my project's root directory:

1) Creating Directories and Files: I made a new directory named docker inside my project. Within this directory, I created the following files:

- docker-compose.yml: This file is the heart of my Docker setup. It defines the services (containers) needed for my application and their configurations.

- Dockerfile (Optional): This file specifies instructions for building a custom Docker image for my application (I'll cover this in a bit).

- entrypoint.sh (Optional): This file defines commands that run when the container starts (useful for custom application setups).

2) docker-compose.yml: I Opened this file and specified the version of docker-compose I'm using. Next, defined services for:
- PHP application server
- Database server (e.g., MySQL)
- Optional: PhpMyAdmin server (for managing my database)

3) Configure Each Service: For each service, I needed to provide details like:

- Image: Specified a pre-built Docker image (e.g., php:8.1-fpm for PHP).
- Ports: Mapped container ports to host machine ports for accessibility (e.g., container port 80 to host port 8080).
- Environment: Defined environment variables needed by my application (e.g., database connection details).
- Volumes: Configured volumes to persist data between container restarts (e.g., map my application code directory to a volume).


## Building and Running the Docker Containers:

1) Build Images (Optional): Since I am using a custom Dockerfile, ran 'docker-compose --build' to build Docker images for my application and services.

2) Start the Containers! Run 'docker-compose up -d' to start all defined services in the background. This downloaded any pre-built images and created and ran the containers.


## Verifying Connectivity:

I also encounter some issues while the containers were up. I had to investigate the issue by verifying the conectivities to make sure everything is talking to each other:

- Inspect Container IP: I used the command 'docker container inspect <container_name>' to retrieve details about a specific container, including its IP address.
- Test Network Connectivity: Used the ping command with the container's IP address to see if the container is reachable from my host machine.
- Verify Network Between Containers: Used 'docker network ls' to list available Docker networks. Then, used 'docker network inspect <network_name>' to view details of a specific network and confirm that my containers are connected.

The above steps are what I followed to have my Laravel real estate application Dockerized and ready to run smoothly on any machine with Docker! Feel free to adapt these steps to your specific.