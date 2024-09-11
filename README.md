
# IP Management Solution

A web-based tool for managing and tracking IP address records. This solution allows users to create, edit, and track changes to IP addresses with notes for additional information.

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
- [Features](#features)
- [API Documentation](#api-documentation)

## Installation

### Requirements

- PHP 8.x or higher
- [Composer](https://getcomposer.org/)
- MySQL (or your preferred database)
- Node.js and npm (for frontend dependencies)

### Steps to Install

1. **Clone the Repository**
   ```bash
   git clone https://github.com/your-username/ip-management-solution.git
   cd ip-management-solution
   ```

2. **Install PHP Dependencies**
   Install Composer dependencies:
   ```bash
   composer install
   ```

3. **Install JavaScript Dependencies**
   Use npm or yarn to install frontend dependencies:
   ```bash
   npm install
   ```

4. **Set Up Environment Variables**
   Copy the `.env.example` file to `.env` and configure your environment variables, especially for your database:
   ```bash
   cp .env.example .env
   ```

   Configure database settings in `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=ip_management
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Generate Application Key**
   Generate a new application key:
   ```bash
   php artisan key:generate
   ```

6. **Run Database Migrations**
   Migrate the database:
   ```bash
   php artisan migrate
   ```

7. **Seed the Database (Optional)**
   Optionally seed the database with default data:
   ```bash
   php artisan db:seed
   ```

8. **Run the Development Server**
   Start the local development server:
   ```bash
   php artisan serve
   ```

   If you have frontend assets, compile them:
   ```bash
   npm run dev
   ```

## Usage

### Accessing the Application

After running the development server, you can access the application in your browser by navigating to:
```
http://localhost:8000
```

### Managing IP Addresses

- **Create a New IP Address**: 
  - Click the "Create New IP" button on the IP Address management page.
  - Fill in the IP address and any relevant notes, then save.
  
- **Edit an IP Address**: 
  - Click the "Edit" button next to any IP address in the list.
  - Modify the IP or the notes and click update.

### Tracking Changes

- Every change made to an IP address (whether it's the IP address itself or associated notes) is logged.
- You can view a record of who made changes and when they were made.

## Features

- **Create, Edit, and Delete IP Records**: Easily manage IP addresses and their related notes.
- **Change Tracking**: Automatically logs changes to any IP address records, including timestamps and user actions.
- **User-Friendly Interface**: A simple and clean user interface for quick management of IP addresses.

## API Documentation

The application provides RESTful API endpoints for managing IP addresses.

### Endpoints

- `GET /ip-addresses`: List all IP addresses.
- `POST /ip-addresses`: Create a new IP address.
- `PUT /ip-addresses/{id}`: Update an existing IP address.
