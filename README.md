# Laravel User & Blog CRUD Application

A Laravel application with User and Blog CRUD operations, built with Laravel UI (Bootstrap).

## Features

- **User Management**: Full CRUD operations for users (Create, Read, Update, Delete)
- **Blog Management**: Full CRUD operations for blogs (Create, Read, Update, Delete)
- **Authentication**: Laravel UI authentication system (Login, Register, Logout)
- **Database Factories**: Factories for generating test data
- **Database Seeders**: Seeders for populating the database with sample data

## Requirements

- XAMPP (includes PHP >= 8.2 and MySQL)
- Composer

## Installation

### 1. Clone the base repository

```bash
git clone https://github.com/prasanth-j/base-code.git
cd base-code
```

### 2. Set up your own Bitbucket repository

After cloning, you'll need to add this project to your own Bitbucket repository:

1. **Create a new repository on Bitbucket** (or use an existing one)

2. **Remove the existing remote origin** (if it exists):
   ```bash
   git remote remove origin
   ```

3. **Add your Bitbucket repository as the new remote**:
   ```bash
   git remote add origin https://bitbucket.org/your-username/your-repository-name.git
   ```
   
   Or if using SSH:
   ```bash
   git remote add origin git@bitbucket.org:your-username/your-repository-name.git
   ```

4. **Push to your Bitbucket repository**:
   ```bash
   git branch -M main
   git push -u origin main
   ```

> **Note**: Replace `your-username` and `your-repository-name` with your actual Bitbucket username and repository name.

### 3. Install PHP dependencies

```bash
composer install
```

### 4. Start XAMPP services

1. **Open XAMPP Control Panel**
2. **Start Apache** (click the "Start" button)
3. **Start MySQL** (click the "Start" button)

### 5. Environment setup

Copy the `.env.example` file to `.env`:

```bash
cp .env.example .env
```

Update the `.env` file with your MySQL database credentials. For XAMPP, use these default settings:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_app
DB_USERNAME=root
DB_PASSWORD=
```

> **Note**: XAMPP's default MySQL username is `root` with no password. If you've set a password, update `DB_PASSWORD` accordingly.

### 6. Generate application key

```bash
php artisan key:generate
```

### 7. Database setup

Create a MySQL database using phpMyAdmin:

1. **Open phpMyAdmin** in your browser: `http://localhost/phpmyadmin`
2. **Click on "New"** in the left sidebar
3. **Enter database name**: `laravel_app` (or the name you used in `.env`)
4. **Click "Create"**

Alternatively, you can create the database using SQL:

1. Go to the **SQL** tab in phpMyAdmin
2. Run this command:
   ```sql
   CREATE DATABASE laravel_app;
   ```

Make sure the database name matches the `DB_DATABASE` value in your `.env` file (see step 5).

### 8. Run migrations

```bash
php artisan migrate
```

### 9. Seed the database (optional)

This will create sample users and blogs:

```bash
php artisan db:seed
```

Or run migrations and seed together:

```bash
php artisan migrate:fresh --seed
```

## Running the Application

### Start the development server

```bash
php artisan serve
```

The application will be available at `http://localhost:8000`

### Using the dev script (includes server, queue, logs, and vite)

```bash
composer run dev
```

## Database Structure

### Users Table
- `id` - Primary key
- `name` - User's name
- `email` - User's email (unique)
- `email_verified_at` - Email verification timestamp
- `password` - Hashed password
- `remember_token` - Remember me token
- `created_at` - Creation timestamp
- `updated_at` - Update timestamp

### Blogs Table
- `id` - Primary key
- `title` - Blog title
- `content` - Blog content
- `user_id` - Foreign key to users table
- `created_at` - Creation timestamp
- `updated_at` - Update timestamp

## Routes

### Authentication Routes
- `GET /login` - Login page
- `POST /login` - Login action
- `GET /register` - Registration page
- `POST /register` - Registration action
- `POST /logout` - Logout action

### User CRUD Routes (Protected by auth)
- `GET /users` - List all users
- `GET /users/create` - Show create user form
- `POST /users` - Store new user
- `GET /users/{user}/edit` - Show edit user form
- `PUT /users/{user}` - Update user
- `DELETE /users/{user}` - Delete user

### Blog CRUD Routes (Protected by auth)
- `GET /blogs` - List all blogs
- `GET /blogs/create` - Show create blog form
- `POST /blogs` - Store new blog
- `GET /blogs/{blog}/edit` - Show edit blog form
- `PUT /blogs/{blog}` - Update blog
- `DELETE /blogs/{blog}` - Delete blog

## Seeders

### UserSeeder
Creates:
- 1 test user (test@example.com)
- 10 additional random users

### BlogSeeder
Creates:
- 3 blogs per user

## Factories

### UserFactory
Generates fake user data with:
- Random name
- Unique email
- Hashed password (default: "password")

### BlogFactory
Generates fake blog data with:
- Random title
- Random content (3 paragraphs)
- Associated user_id

## Default Test User

After seeding, you can login with:
- **Email**: test@example.com
- **Password**: password

## Usage

1. Register a new account or login with the test user
2. Navigate to "Users" in the navigation menu to manage users
3. Navigate to "Blogs" in the navigation menu to manage blogs
4. Create, edit, or delete users and blogs as needed

## Development

### Code Formatting

```bash
./vendor/bin/pint
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
