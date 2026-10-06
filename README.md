# HiveSpace Coworking Event Registration System

HiveSpace is a lightweight Laravel web application for managing coworking community events and allowing visitors to register for upcoming events.

## Features

* Public homepage with upcoming events
* Public event detail pages
* Event registration using name and email
* Registration validation
* Registration confirmation page
* Admin event management
* Create, edit, and delete events
* MySQL database
* Laravel migrations and seeders

## Technology Stack

* Laravel 13
* PHP 8.5
* MySQL 8.4
* Laravel Sail / Docker
* Blade
* Vite
* GitHub
* Railway for deployment

## Requirements

For local development, install:

* PHP 8.5 or compatible PHP version
* Composer
* Docker Desktop
* Git
* VS Code or another code editor

## Clone the Project

Clone the repository:

```bash
git clone https://github.com/ahmedwajid017-pixel/hivespace-event-portal.git
```

Enter the project directory:

```bash
cd hivespace-event-portal
```

## Environment Setup

Copy the example environment file:

```bash
cp .env.example .env
```

On Windows PowerShell, you can also use:

```powershell
Copy-Item .env.example .env
```

Generate the Laravel application key:

```bash
php artisan key:generate
```

If using Laravel Sail, the application key can also be generated through the container:

```bash
docker compose exec laravel.test php artisan key:generate
```

## Database Configuration

The project uses MySQL.

For local Docker/Sail development, configure the database values in `.env` according to the project's Docker Compose configuration.

Typical values are:

```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=hivespace
DB_USERNAME=sail
DB_PASSWORD=password
```

Do not commit the real `.env` file or production credentials to GitHub.

## Install Dependencies

Install PHP dependencies:

```bash
composer install
```

Install frontend dependencies:

```bash
npm install
```

## Database Migration

Run the migrations:

```bash
php artisan migrate
```

To run migrations inside Laravel Sail:

```bash
docker compose exec laravel.test php artisan migrate
```

## Seed Sample Events

The project includes an event seeder for development data.

Run:

```bash
php artisan db:seed --class=EventSeeder
```

Or run all configured seeders:

```bash
php artisan db:seed
```

## Run the Project Locally

Start the Docker containers:

```bash
docker compose up -d
```

The Laravel application is then available at:

```text
http://localhost
```

Useful commands:

```bash
docker compose up -d
docker compose down
docker compose ps
```

To run Artisan commands inside the Laravel container:

```bash
docker compose exec laravel.test php artisan <command>
```

Example:

```bash
docker compose exec laravel.test php artisan migrate
```

## Main Application Pages

### Homepage

```text
/
```

Displays available events and links to their public event pages.

### Event Details and Registration

```text
/events/{event}
```

Displays:

* Event title
* Event date
* Event description
* Registration form

### Registration Submission

```text
/events/{event}/register
```

The registration form accepts:

* Name
* Email

After successful registration, the user receives a confirmation message.

### Admin Event Management

```text
/admin/events
```

The admin section provides event CRUD functionality:

* View events
* Create events
* Edit events
* Delete events

## Validation

Registration data is validated before being stored.

Required fields:

```text
name  - required, string, maximum 255 characters
email - required, valid email, maximum 255 characters
```

## Database Structure

The main application tables include:

### Events

Stores:

* Event title
* Event description
* Event date

### Registrations

Stores:

* Registered event
* Participant name
* Participant email

Each registration belongs to an event through a foreign key.

## Deployment

The project is intended to be deployed on Railway.

The deployment uses the GitHub repository as the application source.

Production environment variables must be configured in Railway. At minimum, configure the Laravel application key and the production database connection.

Never place production passwords, API keys, or other secrets in the GitHub repository.

Database migrations should be run on the Railway deployment using Laravel's production-safe migration command:

```bash
php artisan migrate --force
```

Railway supports a Pre-Deploy Command that can be used to run migrations before the application starts.

## Production Environment Variables

Configure the required variables in Railway rather than committing them to the repository.

Typical Laravel variables include:

```env
APP_NAME=HiveSpace
APP_ENV=production
APP_KEY=your-production-app-key
APP_DEBUG=false
APP_URL=your-production-url

DB_CONNECTION=mysql
DB_HOST=your-database-host
DB_PORT=3306
DB_DATABASE=your-database-name
DB_USERNAME=your-database-user
DB_PASSWORD=your-database-password
```

The exact database values depend on the Railway database service.

## Deployment Verification

After deployment, verify:

1. Homepage loads successfully.
2. Events are displayed.
3. Event detail page opens.
4. Registration form works.
5. Invalid registration data is rejected.
6. Valid registration is saved.
7. Thank-you page is displayed.
8. Admin event CRUD pages work.

## Future Maintenance

For future development:

1. Pull the latest code from GitHub.
2. Create a separate branch for larger changes.
3. Update the `.env` file locally when required.
4. Run migrations after database changes.
5. Test the application locally.
6. Commit and push tested changes.
7. Allow Railway to deploy the updated GitHub code.
8. Check Railway deployment logs if a deployment fails.

Before production database changes, create an appropriate database backup and verify migrations carefully.

## Useful Maintenance Commands

Clear Laravel caches:

```bash
php artisan optimize:clear
```

Check routes:

```bash
php artisan route:list
```

Check migration status:

```bash
php artisan migrate:status
```

Run migrations:

```bash
php artisan migrate --force
```

View Docker services locally:

```bash
docker compose ps
```

## Repository

GitHub repository:

https://github.com/ahmedwajid017-pixel/hivespace-event-portal

## Project Status

The project includes:

* Task 1: Event data model and homepage
* Task 2: Admin event management CRUD
* Task 3: Public event registration
* Task 4: Deployment and project handover documentation

## License

This project is developed as part of an internship/project assignment.
