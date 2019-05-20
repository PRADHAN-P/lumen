# lumen api test

How to Run:

- Run `composer install` to install the required packages
- Copy `.env.example` to `.env`
- Rename Database connection variables in `.env`
- Run `php artisan migrate --seed` to migrate the database tables and seeds.

Test the project by browsing the URL like: <br>
[GET] `http://lumen.test/users/list` to list users <br>
[POST] `http://lumen.test/users/create` to create users <br>
[POST] `http://lumen.test/users/update/id` to update user info <br>
[GET] `http://lumen.test/users/details/id` to get user details <br>
[DELETE] `http://lumen.test/users/delete/id` to delete user <br>

HTTP test file are located inside `/tests/UserTest.php`
