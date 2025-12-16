# ⚽ Blingstin Football Agency Management System

This is a comprehensive, full-stack web application designed to manage the data for a fictional football agency. It includes a public-facing website and a secure Admin Dashboard for CRUD operations on Agents, Players, and Club Managers.

## 🌟 Features

* **Secure Admin Login:** Protects the management interface.
* **Database Setup:** Automated table and sample data creation (`setup.php`).
* **Full CRUD:** Complete Create, Read, Update, and Delete functionality for:
    * **Agents:** The core representatives.
    * **Players:** The represented talent (linked to agents).
    * **Club Managers:** Key contacts for transfers.
* **Responsive Design:** Simple CSS for usability.

## 🚀 Setup Guide

Follow these steps to get the system running on your local machine.

### Prerequisites

1.  **Local Server Environment:** Install and run a server stack like **XAMPP, WAMP, or MAMP**.
2.  **Web Services:** Ensure **Apache** (Web Server) and **MySQL** (Database Server) are running.

### 1. File Placement

1.  Locate your server's document root directory (`htdocs` for XAMPP, `www` for WAMP).
2.  Create a new project folder (e.g., `FAS`).
3.  Copy all project files (`.php`, `.html`, `.css`) into this `FAS` folder.
4.  (Optional) Create a `photo/` folder inside `FAS` for the placeholder images used on `home.html`.

### 2. Database Initialization

This step creates the database and populates it with necessary tables and the initial admin user.

1.  Open your browser and navigate to the setup script:
    `http://localhost/FAS/setup.php`
2.  The script should output confirmation messages:
    ```
    Database Created Successfully
    Tables & Sample Data Created Successfully.
    ```

### 3. Database Credentials (If Needed)

The `dbConnect.php` file is configured with the default XAMPP/WAMP settings. If your database username or password is not `root` and empty (`""`), you must edit `dbConnect.php`:

```php
// dbConnect.php
$serverName = "localhost";
$userName = "root";       // Change this if your server uses a different user
$password = "";           // Change this if you have set a MySQL password
$dbName = "football_agent_system";