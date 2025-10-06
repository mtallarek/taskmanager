# Taskmanager API

A Basic application for managing tasks via API

## Installation

**Edit .env and change the following lines to match your database:**\
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
User Root is administrator
User "User 1" has a fixed token for development purposes: meIsUser 

## Structure:
The app uses laravel santcum for authentication, so for using the API a user with valid token is needed.
Either use the provided development token for user "Root" or create your own https://laravel.com/docs/12.x/sanctum#issuing-api-tokens

A Task must have a status. Available statuses are stored in the database.
A Task can be assigned to a user.
A task can be assigned to a project.

### Entities
#### Status:
id\
label: string, max length: 32 characters

#### Task:
id\
title : required, string, max length: 128 characters\
description: optional, string, max length: 1024 characters, nullable\
status_id: required, must be valid\
deadline: ISO date, optional, must not be in the past for new tasks
user_id: optional, nullable, must be valid\
project_id: opional, nullable, must be valid

#### Project:
id\
title:  string

#### User:
id\
name: string\
user_role_id: Role id of a user

#### UserRole:
id\
name: name for technical usage\
label: label for display


## Usage

Have the application run on a server or development environment (e.g php artisan serve)

The application uses 6 major endpoints for dealing with tasks and 2 for dealing with Statuses.

Users are limited to view and edit their own task. Only administrators can see all tasks.

### Status endpoints

**GET /api/statuses**\
List all available statuses\
**GET /api/statuses/{id}**\
Get details about a specific status

### Task endpoints
**GET /api/tasks**\
List all existing tasks\
Can be filter with query Params wich can all be combined\
- overdue: (bool): Only list overdue tasks
- user_id: Only list tasks of a specific user
- project_id: Only list tasks of a specific project

**GET /api/tasks/{id}**\
Get details about a specific task\
**GET /api/tasks/user/{userId}**\
List all tasks of a specific user\
**GET /api/tasks/project/{projectId}**\
List all tasks of a specific project\
**POST /api/tasks**\
Create a new task\
**PATCH /api/tasks**\
Update an existing task\
**DELETE /api/tasks/{id}**\
Delete an existing task

For creating and updating as task provide the task in JSON format\

```
{
"title": "",
"description": "",
"deadline": "YYYY-MM-DD"
"status_id": 1,
"user_id": 1,
"project_id": 1
}
```

Title and status_id are mandatory, everything lese is otpional.

You can only edit your own tasks. Only users with administrator role can edit or delete other users tasks.\
Only admnistrator users can edit tasks with deadlines in the past.


### Known bugs
Using /api/tasks with filter parameters for user, project or overdue results in wrong links for pagination, which
are missing the parameter

### TO DO
Better error messages\
Testing
