<?php

namespace Query;

use Configuration\Database;

class UserQuery
{

    /**
     * fetch particular record from database table
     * @return array
     */
    public function select(): array
    {
        return (new Database)->query(
            query: "select * from users where id = :current_id",
            parameter: ['current_id' => $_SESSION['user']['id'] ?? false]
        )->fetchAll();
    }

    /**
     * insert data in database table
     * @return void
     */
    public function insert(): void
    {
        (new Database)->query(
            query: 'insert into users ( username, email, biography, password) values (:username , :email, :biography, :password)',
            parameter: [
                'username' => $_POST['userName'],
                'email' => $_POST['email'],
                'biography' => $_POST['biography'],
                'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
            ]
        );
    }

    /**
     * give one record from database and update that
     * @return void 
     */
    public function update()
    {
        (new Database)->query(query: 'update users set username = :username, email = :email, biography = :biography, password = :password where id = :id', parameter: [
            'username' => $_POST['userName'],
            'email' => $_POST['email'],
            'biography' => $_POST['biography'],
            'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
            'id' => $_SESSION['user']['id']
        ]);
    }
}
