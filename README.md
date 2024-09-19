<div align="center">

![PHP](https://img.shields.io/badge/-PHP_8.3.9-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/-Tailwind_CSS_3.4.12-06b6d4?style=for-the-badge&logo=tailwind-css&logoColor=white)
![Livewire](https://img.shields.io/badge/-Livewire_3.x-FB70A9?style=for-the-badge&logo=livewire&logoColor=white)
![Alpine.js](https://img.shields.io/badge/-Alpine.js_3.14.1-8BC0D0?style=for-the-badge&logo=alpine.js&logoColor=black)
![Laravel](https://img.shields.io/badge/-Laravel_11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Filament](https://img.shields.io/badge/-Filament_3.x-F67A31?style=for-the-badge&logo=filament&logoColor=white)

</div>

# TravelKuy Admin Dashboard

TravelKuy Admin Dashboard is a powerful administrative interface built with Laravel and Filament. It provides comprehensive management capabilities for a travel booking system, allowing administrators to efficiently handle transactions, user accounts, holiday packages, and categories.

## Features

- **User Management**: Create, view, update, and delete user accounts.
- **Transaction Handling**: Manage and track all travel bookings and transactions.
- **Holiday Package Management**: Add/Edit poster image, Create, and manage holiday packages offered to customers.
- **Category Organization**: Organize holiday packages into categories for easy navigation.
- **Dashboard Analytics**: View key metrics and statistics about bookings and user activity.

## Entity-Relationship Diagram (ERD)

To understand the data structure of TravelKuy, please refer to our Entity-Relationship Diagram:

![TravelKuy ERD](ERD.png)

This diagram illustrates the relationships between Users, Transactions, Holiday Packages, and Categories.

## Installation

1. Clone the repository:
   ```
   git clone https://github.com/asiata25/travel-kuy.git
   ```

2. Navigate to the project directory:
   ```
   cd travel-kuy
   ```

3. Install PHP dependencies:
   ```
   composer install
   ```

4. Install JavaScript dependencies:
   ```
   npm install
   ```

5. Copy the `.env.example` file to `.env` and configure your database settings.

6. Generate an application key:
   ```
   php artisan key:generate
   ```

7. Run database migrations:
   ```
   php artisan migrate
   ```

8. Seed the database with initial data (optional):
   ```
   php artisan db:seed
   ```

9. Create a symbolic link for storage:
   ```
   php artisan storage:link
   ```

   **Don't forget this step!** It's crucial for proper file handling in the application.

## Running the Application

1. Start the Laravel development server:
   ```
   php artisan serve
   ```

2. In a new terminal, compile and watch for asset changes:
   ```
   npm run dev
   ```

3. Open `http://localhost:8000/dashboard`
   <img src="dashboard.png"/>

## Test Account

For testing purposes, you can use the following credentials to access the admin dashboard:

- Email: test@example.com
- Password: password


## Author

<p align="center">
<a href="https://lutfikhoir.com/"><img src="https://img.shields.io/badge/Website-lutfikhoir.com-blue?style=for-the-badge&logo=google-chrome&logoColor=white&labelColor=101010" alt="Personal Website"></a>
<a href="https://www.linkedin.com/in/lutfi-khoir-632524235/"><img src="https://img.shields.io/badge/LinkedIn-Lutfi%20Khoir-0077B5?style=for-the-badge&logo=linkedin&logoColor=white&labelColor=101010" alt="LinkedIn"></a>
<a href="https://www.instagram.com/lutfi.khoirudin/"><img src="https://img.shields.io/badge/Instagram-@lutfi.khoirudin-E4405F?style=for-the-badge&logo=instagram&logoColor=white&labelColor=101010" alt="Instagram"></a>
<a href="https://www.youtube.com/@lutfikhoir2502"><img src="https://img.shields.io/badge/YouTube-Lutfi%20Khoir-FF0000?style=for-the-badge&logo=youtube&logoColor=white&labelColor=101010" alt="YouTube Channel"></a>

</p>
