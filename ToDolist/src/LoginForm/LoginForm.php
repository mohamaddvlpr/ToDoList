<?php

use Validations\Restriction;

basePath('/src/Validations/Restriction.php');

class LoginForm
{
    public $errors = [];

    /**
     * return Error Of email
     * @return void
     */
    public function emailError($email, $field, $message): void
    {
        if (!Restriction::email(email: $email)) {
            $errors[$field] = $message;
        }
    }

    /**
     * return Error Of email
     */
    public function passError($password, $field, $message)
    {
        if (!Restriction::string(value: $password)) {
            $this->errors[$field] = $message;

            return $this;
        }
    }

    /**
     * check the error of data
     * @return void
     */
    public function errors($password, $key, $message): LoginForm
    {
        if (!Restriction::string(value: $password)) {
            $this->errors[$key] = $message;

            return $this;
        }
    }

    /**
     * check the form infomation shouldnt be empty
     * @return void
     */
    public function isNotEmpty($errors, $path, $field, $err): void
    {
        if (!empty($errors)) {
            viewPath(path: $path, parameter: [
                $field => $err
            ]);
        }
    }
}
