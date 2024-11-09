# Task Manager

A simple task manager application where users can register, log in, create tasks, and manage their tasks. Guests can view tasks and leave comments but cannot edit or delete them.

## Features

User registration and login: Users can create accounts and log in to access task management features.

Task creation: Users can create tasks with a title and description.

Task ownership: Only task owners can edit or delete their tasks.

Guest access: Guests can view tasks and leave comments or reviews but cannot modify or delete tasks.

## Prerequisites

Before you begin, ensure you have the following installed:

PHP >= 8.x

Composer

Laravel >= 10.x

MySQL

## Installation

1. Clone the repository:

First, clone the repository to your local machine and navigate to your project folder.

git clone https://github.com/Abdelrahmanmoussan/Blog
cd Blog

2. Install dependencies:

    Install all necessary dependencies using Composer.
    composer install

    ### Set up the environment:

Copy the example environment file and generate an app key for your Laravel application.

cp .env.example .env
php artisan key:generate

## Configure the database:

Update the .env file with your database credentials:

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=task_manager

DB_USERNAME=your_db_username

DB_PASSWORD=your_db_password

## Run migrations:

Set up the database tables by running the migrations.
php artisan migrate

## Start the development server:

Launch the application on the local server.

php artisan serve
Your application will be accessible at http://localhost:8000.

Database Structure
Users: Stores user data, including authentication credentials.

id: Primary key

name: User's name

email: User's email

password: User's hashed password

Tasks: Stores task details created by users.

id: Primary key

user_id: Foreign key referencing Users

title: Title of the task

description: Description of the task

Comments: Stores comments and reviews on tasks.

id: Primary key

task_id: Foreign key referencing Tasks

user_id: Foreign key referencing Users

comment: Comment text

## Authentication Setup

This task manager application uses Laravel's built-in authentication features.

To enable user authentication:

## Install authentication scaffolding:

You can use Laravel Breeze, Fortify, or another package for authentication scaffolding. For example, using Laravel Breeze:

composer require laravel/breeze --dev
php artisan breeze:install
npm install && npm run dev
Register and Login:

Users can create accounts and log in to access task management features.

## Permissions:

Users are only able to edit or delete the tasks they have created. You can set this permission in your task management logic.

For guests, they can view tasks and leave comments but cannot modify or delete tasks.
