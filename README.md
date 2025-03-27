# Simple Event Booking - Backend

This is the backend service for the Simple Event Booking application. It provides APIs to manage events, bookings, and users.

## Development Approach

The development of the backend service follows a modular and iterative approach:

1. **Planning and Design**:
  - Define the core features and API endpoints.
  - Design the database schema to support events, users, and bookings.

2. **Setup and Configuration**:
  - Set up the Laravel framework and configure the environment.
  - Integrate database connections and configure migrations.

3. **Feature Implementation**:
  - Develop modules for user authentication and authorization.
  - Implement event creation, management, and booking functionalities.
  - Create RESTful API endpoints for all features.

4. **Testing**:
  - Write unit and integration tests for critical components.
  - Test API endpoints using tools Postman.


5. **Deployment**:
  - Prepare the application for deployment by optimizing configurations.
  - Deploy to a production server and monitor for issues.

This approach ensures a structured and maintainable development process.

## Features
- Event creation and management
- User registration and authentication
- Booking system for events
- RESTful API endpoints

## Requirements
- PHP >= 8.2
- Composer
- MySQL, PostgreSQL, SQLite, or SQL Server.
- XAMPP or any compatible server environment

## Installation
1. Clone the repository:
  ```bash
  git clone https://github.com/your-repo/simple-event-booking.git
  ```
2. Navigate to the backend directory:
  ```bash
  cd simple-event-booking/backend
  ```
3. Install dependencies:
  ```bash
  composer install
  ```
4. Configure the `.env` file with your database credentials.
5. Run database migrations:
  ```bash
  php artisan migrate
  ```

## Usage
Start the development server:
```bash
php artisan serve
```
Access the API at `http://localhost:8000`.