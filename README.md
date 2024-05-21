# Basic PHP Login System with composer usage

A test login system built in 6 hours with some composer vendors in PHP, featuring user registration, login, and file
uploads.

Note: This code is a demonstration of my skills and is not perfect.

## Requirements

- **PHP**: 7.4 or above
- **MySQL**: 5.7 or above
- **PHP Modules**:
    - php-mysql
    - php-pdo

## Installation

1. **Clone the repository**:
    ```sh
    git clone https://github.com/kimek/playground-composer-php-login.git
    cd playground-vanilla-php-login
    ```

2. **Set up the database**:
    - Create a new MySQL database, tables, user:
      ```sh
      mysql -u your_username -p < migration/migration.sql
      ```

3. **Configure the application**:
    - If you would like to use custom DB credentials, update `config.php`.


4. **Ensure required PHP modules are installed**:
    - You can check for installed modules using the following command:
      ```sh
      php -m
      ```
    - To install missing modules, use:
      ```sh
      sudo apt-get install php-mysql php-pdo
      ```


5. **Install dependancies**:
    - Run composer install:
      ```sh
      composer install
      ```

## Usage

1. **Start your local development server**:
    ```shell
    php -S localhost:8000
    ```

2. **Access the application api**:

- Login

    ```shell
    curl -X POST -d "email=matt1&password=matt12345&action=login" http://localhost:8000/src/api.php
    ```

- Register

   ```shell
   curl -X POST -d "email=matt1&password=matt12345&action=register" http://localhost:8000/src/api.php
   ```

## Features

- User Registration
- User Login
- File Upload

## Folder Structure

- `.env` - Configuration file.
- `migration/migration.sql` - Contains the SQL schema for setting up the database.
- `src/view/login.php` - Login template form.
- `src/api.php` - Basic api script.
- `src/Config/database.php` - Database credentials.
- `src/Controller/FileUploader.php` - File upload handling script.
- `src/Controller/UserController.php` - Login and registration handling script.
- `src/Model/User.php` - User model.
- `src/Repositories/Database.php` - DB handling script.
- `src/Repositories/EloquentUserRepository` - User repository.

## Contributing

If you wish to contribute to this project, please follow these steps:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature/your-feature-name`).
3. Commit your changes (`git commit -m 'Add some feature'`).
4. Push to the branch (`git push origin feature/your-feature-name`).
5. Open a Pull Request.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more information.

## Contact

For any questions or inquiries, please create contribution issue ticket.

