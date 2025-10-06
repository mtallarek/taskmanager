# Taskmanager API

A Basic application for managing tasks via API

## Installation

**copy .env.example to .env and change the following lines to match your database:**\
DB_CONNECTION=mysql\
DB_HOST=127.0.0.1\
DB_PORT=3306\
DB_DATABASE= YOUR_DB\
DB_USERNAME= YOUR_USERNAME\
DB_PASSWORD= YOUR_PW

**run the following commands**\
composer install\
php artisan migrate\

**For testing purposes run**\
php artisan db:seed

This will populate your database with some basic entities.\
3 usable Statuses for tasks: "TO DO", "In progress" and "Done"\
3 Users: "Root", "User 1" and "User 2"

User "Root" has a fixed token for development purposes: meIsDev42

## Structure:
The app uses laravel santcum for authentication, so for using the API a user with valid token is needed.
Either use the provided development token for user "Root" or create your own https://laravel.com/docs/12.x/sanctum#issuing-api-tokens

A Task must have a status. Available statuses are stored in the database.

### Entities
#### Status:
id\
label: string, max length: 32 characters

#### Task:
id\
title : required, string, max length: 128 characters\
description: optional, string, max length: 1024 characters, nullable\
status_id: required, must be valid\

## Usage

Have the application run on a server or development environment (e.g php artisan serve)

The application uses 4 major endpoints for dealing with tasks and 2 for dealing with Statuses.

### Status endpoints

**GET /api/statuses**\
List all available statuses\
**GET /api/statuses/{id}**\
Get details about a specific status

### Task endpoints
**GET /api/tasks**\
List all existing tasks\
**GET /api/tasks/{id}**\
Get details about a specific task\
**POST /api/tasks**\
Create a new task\
**PUT /api/tasks**\
Update an existing task\
**DELETE /api/tasks/{id}**\
Delete an existing task

For creating and updating as task provide the task in JSON format\

```
{
"title": "",
"description": "",
"status_id": 1,
}
```

Title is mandatory and status_id are mandatory, description is optional.
