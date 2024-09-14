<p align="center">
  <img src="https://private-user-images.githubusercontent.com/41773797/257018536-8d5a0b12-4643-4b5c-964a-56f0db91b90a.png?jwt=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJnaXRodWIuY29tIiwiYXVkIjoicmF3LmdpdGh1YnVzZXJjb250ZW50LmNvbSIsImtleSI6ImtleTUiLCJleHAiOjE3MjYyOTA2NDEsIm5iZiI6MTcyNjI5MDM0MSwicGF0aCI6Ii80MTc3Mzc5Ny8yNTcwMTg1MzYtOGQ1YTBiMTItNDY0My00YjVjLTk2NGEtNTZmMGRiOTFiOTBhLnBuZz9YLUFtei1BbGdvcml0aG09QVdTNC1ITUFDLVNIQTI1NiZYLUFtei1DcmVkZW50aWFsPUFLSUFWQ09EWUxTQTUzUFFLNFpBJTJGMjAyNDA5MTQlMkZ1cy1lYXN0LTElMkZzMyUyRmF3czRfcmVxdWVzdCZYLUFtei1EYXRlPTIwMjQwOTE0VDA1MDU0MVomWC1BbXotRXhwaXJlcz0zMDAmWC1BbXotU2lnbmF0dXJlPTU4ZDBiNGE4NWQ4NTFmMTlhZDMyM2QwMjBmNmNhNTRkM2MxZjcyOGJiNjcyZGZmMjY2ZTNkNWU5MzRjZGE4OWQmWC1BbXotU2lnbmVkSGVhZGVycz1ob3N0JmFjdG9yX2lkPTAma2V5X2lkPTAmcmVwb19pZD0wIn0.fKHeE2JCvb0YH2f5Zt9gAy8HtsoLLd1skML3SqX-mZQ" alt="Filament Banner">
</p>

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

The admin dashboard should now be accessible at `http://localhost:8000/admin`.

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