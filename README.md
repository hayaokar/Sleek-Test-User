
# Authentication Service

This service is responsible for managing user authentication, including user registration, login, and token generation. It provides the necessary endpoints for handling authentication processes using **Laravel Sanctum** for API token management.

## Features
- User Registration
- User Login
- Token Generation and Management (using Sanctum)
- Token Validation Endpoint

## Prerequisites
Before running the Authentication Service, ensure that you have the following installed:
- PHP 8.x
- Composer
- MySQL or any other supported database

## Installation

1. Clone the repository:
    ```bash
    git clone <repository-url>
    cd authentication-service
    ```

2. Install dependencies:
    ```bash
    composer install
    ```

3. Set up environment variables by copying the `.env.example` file:
    ```bash
    cp .env.example .env
    ```

4. Update the `.env` file with your database and pusher:
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_username
    DB_PASSWORD=your_password

    SANCTUM_STATEFUL_DOMAINS=your_domain
    SESSION_DOMAIN=your_domain
    ```

5. Generate an application key:
    ```bash
    php artisan key:generate
    ```

6. Run database migrations:
    ```bash
    php artisan migrate
    ```

## Running the Project

To serve the application, run:
```bash
php artisan serve
```

## Testing

To test the API, you can use Postman or any other API testing tool. You will also be provided with a Postman collection to simplify the process.


