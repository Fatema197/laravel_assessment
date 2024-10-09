# Laravel Assignment
#### This project is the assessment for the full stack developer assessment at ASTUDIO.
#### This documentation provides the steps required to set up and run the Laravel project for the assessment.

* **Author**: Fatema Alabdalla
* **Last update**: 09/10/2024

## Prerequisites

Before setting up the project, ensure that the following are installed on your system:

- **PHP** (version 8.0 or above)
- **Composer** (for PHP package management)
- **MySQL** (or any other supported database engine)
- **Laravel** (version 11.x or later)

## General Notes:

1. The `database` in **SQL** format can be found here: [Database Schema](database/assignment_database/fatema_laravel_assignment.sql).
   
2. The `database ERD` (Entity-Relationship Diagram) can be viewed here: [ERD](database/assignment_database/fatema_laravel_assignment.pdf).
   
3. A **Postman Collection** with the API endpoints for testing is available here: [Postman Collection](postman_collection/Assignment.postman_collection.json).

4. The **User Seeders** script, for inserting user data into the database, is available here: [UserSeeder](database/seeders/UserSeeder.php).

5. The **Timesheet Seeders** script, for inserting timesheet records, can be found here: [TimesheetSeeder](database/seeders/TimesheetSeeder.php).

6. The **Project Seeders** script, for inserting project data, can be accessed here: [ProjectSeeder](database/seeders/ProjectSeeder.php).

## Clone the Repository

Start by cloning the repository to your local machine:

```bash
git clone git@github.com:Fatema197/laravel_assessment.git
cd laravel_assessment
```

## Install Dependencies

Run the following command to install all project dependencies:

```bash
composer install
```
## Database Setup

To get started with the project, you have two options for setting up the database schema:

#### Option 1: Import Predefined Database Schema

You can import a predefined database schema by using the provided SQL file.

1. **Locate the SQL file:**
   - Path: `database/assignment_database/fatema_laravel_assignment.sql`

2. **Import the SQL file into your database:**
   
   - For **MySQL**:
     ```bash
     mysql -u your_username -p your_database_name < path_to_sql_file/fatema_laravel_assignment.sql
     ```

   - For **PostgreSQL**:
     ```bash
     psql -U your_username -d your_database_name -f path_to_sql_file/fatema_laravel_assignment.sql
     ```

3. **Verify successful import:**
   Run the following command to check if the tables are created correctly:
   ```bash
   php artisan migrate:status
   ```

#### Option 2: Use Laravel Migrations to Create an Empty Database

Alternatively, you can use Laravel migrations to set up an empty database schema. Follow these steps:

1. **Configure the `.env` file:**
   
   Ensure your `.env` file is properly set up with your database credentials:
   
   ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=fatema_laravel_assignment
    DB_USERNAME=root
    DB_PASSWORD=
   ```

2. **Run the migrations:**

   Use Laravel's migration system to create the necessary tables:
   
   ```bash
   php artisan migrate
   ```

   This will create all the required tables in your database.

3. **Seed the database (optional):**
   
   If you need sample data, you can seed the database by running:
   
   ```bash
   php artisan db:seed
   ```

## Serve the Application

Run the following command to start the Laravel development server:

```bash
php artisan serve
```

By default, the application will be accessible at:

```
http://127.0.0.1:8000
```

## Testing the API Endpoints

You can test the API using **Postman** or any other API testing tool. A pre-built Postman Collection can be found here:

[Postman Collection](postman_collection/Assignment.postman_collection.json)

- Import this collection into Postman and use the provided routes for testing.

- To access any endpoint other than `(login, register)` you need to have an access token.
- Use the `register` endpoint to create a new user, then use the `login` endpoint to get a new access token, this token must be used as a `Bearer Auth Token` in each request header.

## Additional Notes

- If you face any migration issues or want to start from scratch, you can clear all migrations and reset the database by running:

  ```bash
  php artisan migrate:fresh
  ```

  This will drop all tables and re-run the migrations.

- Make sure your database connection details in the `.env` file are correct to avoid any connection issues.