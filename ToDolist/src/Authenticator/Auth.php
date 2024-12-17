<?php

namespace Authenticator;

use Configuration\Database;

class Auth
{
    /**
     * find same email and password who belong each other
     * @return bool
     */
    public function adapt(string $email, string $password): bool
    {
        $user = (new Database)->query(
            query: 'select * from users where email = :email',
            parameter: [
                'email' => $email
            ]
        )->fetch();

        if ($user) {
            if (password_verify(password: $password, hash: $user['password'])) {
                $this->login(user: [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'email' => $user['email']
                ]);

                return true;
            }
        }
        return false;
    }

    /**
     * Create Login Session
     * @return void
     */
    public static function login(array $user): void
    {
        session_start();
        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email']
        ];
        session_regenerate_id(true);
    }

    /**
     * Logging Out And Delete Session
     * @return void
     */
    public function logout(): void
    {
        if (isset($_SESSION['user']) && $_SESSION['user'] == true) {
            $_SESSION = [];

            session_destroy();

            $params = session_get_cookie_params();

            setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
        }
    }
}
