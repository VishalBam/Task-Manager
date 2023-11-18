# Task Manager App

A simple Task Manager application built with PHP, MySQL, HTML, CSS, and JavaScript. This application enables users to perform basic CRUD operations - Create, Read, Update, and Delete tasks.

## Features
- **Create**: Implement a form to add a new task. Each task should have a title and a description.
- **Read**: Display the list of tasks on the main page. Each task should show its title and a brief description.
- **Update**: Provide a way to edit the details of an existing task. Include a form that allows the user to update the task's title and description.
- **Delete**: Add a button or option to delete a task from the list.

### Setup
 - Apache Server using xampp application.
 - Files to be paste in htdocs directory inside xampp location.
 - Connect the MySQL with `config.php` file by giving host name, database name, user name, and password.
 - Turn on the apache server from xampp and run the `index.php` file on the browser. 

## Technologies Used
- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL,MySQL Workbench

## Getting Started
1. Clone the repository.
2. Set up a MySQL database and update the `config.php` file.
3. Start the PHP development server.
4. Open your browser and navigate to `http://localhost:3306`.

## Directory Structure
- `index.php`: Main application file with HTML, CSS, JavaScript, and PHP code.
- `config.php`: Configuration file for MySQL database connection.
- `tasks.php`: PHP functions for managing tasks in the database.

