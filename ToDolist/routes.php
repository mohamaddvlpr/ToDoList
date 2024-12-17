<?php

use Router\Route;
use Validations\Restriction;
use Query\TaskQuery;
use Query\UserQuery;

require 'functions.php';
basePath('/src/Validations/Restriction.php');
basePath('src/Query/TaskQuery.php');
basePath('src/Query/UserQuery.php');
basePath('src/Authenticator/Auth.php');

Route::get('/', fn() =>  viewPath('index'));

Route::get('/about', fn() => viewPath('about'));

Route::get('/support', fn() => viewPath('support'));

Route::get('/tasks', 'TaskController@index');

Route::post('/tasks', 'TaskController@delete');

Route::get('/create/tasks', 'TaskController@create');

Route::post('/create/tasks', 'TaskController@store');

Route::get('/edit', fn() => viewPath('tasks/edit'));

Route::post('/task', function () {
    $errors = [];

    if (! Restriction::string(value: $_POST['name'], min: 1, max: 100)) {
        $errors['name'] = "تسک وارد شده شما نامعتبر می باشد";
    }

    if (! Restriction::string(value: $_POST['notification'], min: 1, max: 400)) {
        $errors['notification'] = "اعلان وارد شده شما نامعتبر می باشد";
    }

    if (! Restriction::string(value: $_POST['place'], min: 1, max: 100)) {
        $errors['place'] = "مکان وارد شده شما نا معتبر می باشد";
    }

    if (!empty($errors)) {
        viewPath('/tasks/edit', [
            'errors' => $errors
        ]);
    } else {
        (new TaskQuery)->update();

        redirect('/tasks');
    }
});

Route::get('/users', 'UserController@index');

Route::get('/create/users', 'UserController@create');

Route::post('/create/users', 'UserController@store');

Route::get('/edit/user', fn() => viewPath('users/edit'));

Route::post('/user', function () {
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
        viewPath('users/edit', [
            'errors' => $errors
        ]);
    } else {
        (new UserQuery)->update();

        session_start();
        $_SESSION['user']['username'] = $_POST['userName'];

        redirect('/users');
    }
});

Route::get('/login', 'SessionController@create');

Route::post('/session', 'SessionController@store');

Route::post('/session/delete', 'SessionController@delete');
