<?php

use Configuration\Database;
use Validations\Restriction;
use Query\UserQuery;
use Authenticator\Auth;

require '../functions.php';

basePath('src/Configuration/Database.php');
basePath('src/Query/UserQuery.php');
basePath('src/Validations/Restriction.php');
basePath('src/Authenticator/Auth.php');

currentUserUri();

class UserController
{
    /** Fetch Main ColumnName in Database From Table
     * @return array
     */
    public function column(): array
    {
        return (new Database)->query(
            query: 'select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME="users" and TABLE_SCHEMA="todolist" LIMIT 3 OFFSET 1'
        )->fetchAll();
    }

    /** 
     * Fetch All record From user Table
     * @return array
     */
    public function index(): array
    {
        return (new UserQuery)->select();
    }

    /**
     * return create view
     * @return void
     */
    public function create(): void
    {
        if ($_SESSION['user'] ?? false) {
            redirect(to: '/');
        }

        viewPath(path: 'users/create');
    }

    /**
     * validate user input and then add record in database table
     * @return void
     */
    public function store(): void
    {
        $errors = [];

        if (! Restriction::string(value: $_POST['userName'], min: 6, max: 50)) {
            $errors["userName"] = "لطفا نام کاربری معتبر وارد کنید";
        }

        if (! Restriction::string(value: $_POST['password'], min: 8, max: 100)) {
            $errors["password"] = "لطفا رمز عبور معتبر وارد کنید";
        }

        if (! Restriction::string(value: $_POST['biography'], min: 20, max: 500)) {
            $errors["biography"] = "لطفا بیوگرافی معتبر وارد کنید";
        }

        if (! Restriction::email(email: $_POST['email'])) {
            $errors["email"] = "لطفا ایمیل معتبر وارد کنید";
        }


        if (! empty($errors)) {
            viewPath(path: 'users/create', parameter: [
                'errors' => $errors
            ]);
        } else {
            (new UserQuery)->insert();

            redirect(to: '/login');
        }
    }
}
