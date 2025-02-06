# Rest API - Products

This project is a Rest Api App with a single endpoint to get Products where user can filter by "pricesLessThan" and "category".


### 1. Create a .env and a .env.testing files from .env.example

    You can use this Bash command from the root directory of your project:
    
    cp .env.example .env
    cp .env.example .env.testing 
    And add this line TESTING_ENV=true inside .env.testing

### 2. Laravel requires a unique application key to encrypt data. You can generate this key by running the following command:

    php artisan key:generate

### 3. Run the following command from the console in the root directory of your project

    You can use this Bash command from the root directory of your project:

    composer install

### 4. Open your MySQL client or use a database client like phpMyAdmin and create a database with the same name as specified in the .env file and also in the .env.testing file under the variable:     

    .env
    DB_DATABASE=database_name

    .env.testing
    DB_DATABASE=database_name_test

    mysql command
    CREATE DATABASE database_name;
    CREATE DATABASE database_name_test;

### 5. Run Laravel migrations and seeders, which will preload necessary initial records required for proper functionality, such as the login user

    You can use this Bash command from the root directory of your project:

    php artisan migrate --seed

    We don't need to migrate in the testing mode in this case.

### 6. Execute the implemented tests

    php artisan test

### 6. Acces http://localhost

    I used Apache, but you can also use Laravel's built-in server with:

        php artisan serve

### 7. Log in

    Check the file \database\seeders\UserSeeder.php. The login credentials can be found there.




### -------------- Additional Notes ------------ ###


    Some files have been kept in the repository for potential future extensions like:

        .editorconfig
