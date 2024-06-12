
# Web Platform for Football Team and Contact Management

This platform provides a comprehensive system for managing team details and contacts. It's built with PHP and utilizes a MySQL database, handling operations such as adding, editing, deleting, and listing teams and contacts.

## Features

- **Team Management**: Manage team details including adding new teams, editing existing team information, and deleting teams.
- **Contact Management**: Handle contact details with functionality to add, retrieve, and delete contacts.
- **Autoloading**: Utilizes a custom autoloader to dynamically load classes as needed.
- **Database Connectivity**: Utilizes a custom database wrapper class for MySQL connections and operations.

## Installation

1. Clone the repository to your local machine.
2. Set up a MySQL database and import the provided SQL schema.
3. Configure your database connection settings in the `Config` class located at `./lib/Core/Config.php`.
4. Ensure your PHP server is set up and point your web server to the project's root directory.

## Usage

Navigate to the home page to access the features. The interface allows for:
- Listing all teams and their details.
- Adding, editing, and deleting team records.
- Managing contact information through the contact management system.

## Directory Structure

- `lib/`: Core library classes including database operations, autoload functionality, etc.
- `admin/`: Administrative functionalities like user management.
- `assets/`: Static assets like stylesheets and images.
- `index.php`: Entry point for the list of teams.
- `teamdetails.php`: Detailed view for individual teams.
- `contact.php`: Contact management entry point.

