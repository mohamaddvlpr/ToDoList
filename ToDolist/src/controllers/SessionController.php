<?php

use Authenticator\Auth;

basePath('/src/LoginForm/LoginForm.php');
basePath('/src/Configuration/Database.php');
basePath('/src/Authenticator/Auth.php');


class SessionController
{
    /**
     * Return View Page
     * @return void
     */
    public function create(): void
    {
        if (isset($_SESSION['user'])) {
            redirect(to: '/');
        }
        viewPath(path: 'sessions/session');
    }

    /**
     * store Input Information From User
     * @return void
     */
    public function store(): void
    {
        $errors = [];

        (new LoginForm)->emailError(email: $_POST['email'], field: 'email', message: 'Your Email is Invalid');

        (new LoginForm)->passError(password: $_POST['password'], field: 'password', message: 'Your password is Invalid');

        (new LoginForm)->isNotEmpty(errors: $errors, path: '/sessions/session', field: 'errors', err: $errors);

        $user = (new Auth)->adapt(email: $_POST['email'], password: $_POST['password']);

        if (!$user) {
            viewPath(
                path: '/sessions/session',
                parameter: [
                    'errors' => [
                        'email' => 'ایمیل و رمز عبور شما صحیح نیست'
                    ]
                ]
            );
        }
        redirect(to: '/');
    }

    /**
     * Logging Out And User Session
     */
    public function delete()
    {
        session_start();
        (new Authenticator\Auth)->logout();
        redirect(to: '/');
    }
}
