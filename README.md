# laravel-crud
This project was made by © Glori4n(https://glori4n.com).

An user crud made on Laravel that applies most of the concepts involved in the standard creation of such, the objective of this project is to have a template CRUD system made with Laravel, mySQL and HTML, as well as having a login system using Laravel's Auth, it also have permissions with 3 levels of access:

<b>1 => admin, (Can create/delete users and superUsers.)<br>
2 => superUser, (Can create/delete users.)<br>
3 => user (Can only view the users.)<br></b>

You can run the migrations with the <b>php artisan migrate</b> command, afterwards you can use <b>php artisan db:seed</b> to seed your DB.

The first user created on the database will always be the admin (role_id = 1).
