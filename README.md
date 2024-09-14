# Todo List Application

A simple Todo List web application built with **Laravel**, **Livewire**, and the **Service/Action Design Pattern**. This app allows users to add, edit, update, complete, and delete tasks with the ability to filter them by **All**, **Completed**, or **Pending** statuses.

## Features

- **Add new tasks** with a title and optional description.
- **Edit and update tasks** with dynamic status changes.
- **Mark tasks as completed** or pending with a checkbox.
- **Delete tasks** with a confirmation modal for safe deletion.
- **Filter tasks** based on their status (All, Completed, or Pending).
- **Responsive UI** styled with **Tailwind CSS**.
- Backend validation and business logic encapsulated using the **Service/Action Design Pattern**.
- **MySQL Database** integration for task storage.
- **Test cases** using PHPUnit and Livewire's testing utilities.

## Technologies Used

- **Laravel 11**: Backend framework.
- **Livewire**: For dynamic front-end interactions.
- **Alpine.js**: For handling simple UI interactions like modals.
- **Service/Action Design Pattern**: To organize the business logic of tasks.
- **Tailwind CSS**: For responsive and modern UI design.
- **MySQL**: Database management.
- **PHPUnit**: For automated testing.
- **Livewire Testing Utilities**: For testing Livewire components.

## Installation

### Prerequisites

- PHP >= 8.0
- Composer
- Node.js and NPM
- MySQL or other supported databases

### Steps to Install

1. **Clone the repository**:

    ```bash
    git clone https://github.com/esraamagddi/todo-app.git
    cd todo-app
    ```

2. **Install dependencies**:

    ```bash
    composer install
    npm install
    ```

3. **Environment setup**:

    Create a `.env` file and configure your database:

    ```bash
    cp .env.example .env
    ```

    Then update the `.env` file with your MySQL database configuration:

    ```dotenv
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

4. **Generate application key**:

    ```bash
    php artisan key:generate
    ```

5. **Run database migrations**:

    ```bash
    php artisan migrate
    ```

6. **Compile front-end assets**:

    ```bash
    npm run dev
    ```

7. **Run the development server**:

    ```bash
    php artisan serve
    ```

Now you can access the application at `http://localhost:8000`.

## Usage

- **Add Tasks**: Navigate to the main page and use the "Add Task" form to add a new task with a title and optional description.
- **Edit or Delete Tasks**: Use the buttons under each task to edit or delete them. A confirmation modal will appear before deletion.
- **Filter Tasks**: Use the filter buttons (All, Completed, Pending) at the top to view tasks based on their status.
- **Mark as Completed/Pending**: Toggle the checkbox next to each task to change its status.

## Folder Structure

- **app/Actions/ToDo**: Contains the Action classes for managing tasks (`Create`, `Update`, `Delete`, `Filter`).
- **app/Services**: Contains the service layer to abstract business logic.
- **app/Livewire/ToDo**: Livewire components for dynamic task listing and management.
- **resources/views/livewire/to-do**: Blade templates for task management UI.

## Testing

To run the test suite, which includes PHPUnit tests for your PHP code and Livewire testing utilities for Livewire components, use:

```bash
php artisan test
```
This will execute  test cases and ensure that everything is functioning as expected.
