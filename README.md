# Task Manager

A simple task manager application where users can register, log in, create tasks, and manage their tasks. Guests can view tasks and leave comments but cannot edit or delete them.

## List the main features:

User registration and login
Task creation with title and description
Only task owners can edit or delete tasks
Guests can view tasks and leave comments or reviews

## installation instructions:

-   PHP >= 8.x
-   Composer
-   Laravel >= 10.x
-   MySQL

1. Clone the repository:

    ```bash
    git clone <your-repo-url>
    cd <your-project-folder>

    composer install

    ```

### Database Structure

-   **Users**: Stores user data, including authentication credentials.

    -   `id`: Primary key
    -   `name`: User's name
    -   `email`: User's email
    -   `password`: User's hashed password

-   **Tasks**: Stores task details created by users.

    -   `id`: Primary key
    -   `user_id`: Foreign key referencing `Users`
    -   `title`: Title of the task
    -   `description`: Description of the task

-   **Comments**: Stores comments and reviews on tasks.
    -   `id`: Primary key
    -   `task_id`: Foreign key referencing `Tasks`
    -   `user_id`: Foreign key referencing `Users`
    -   `comment`: Comment text

### Authentication Setup

The task manager application uses Laravel's built-in authentication features.

To enable user authentication:

1. Use `php artisan make:auth` to generate the necessary views and controllers.
2. Register/Login allows users to create accounts and access task management features.
3. Permissions are managed so that users can only edit/delete their tasks.

For guests, they can view tasks and leave comments but cannot modify or delete any tasks.
