<?php

namespace Query;

session_start();

use Configuration\Database;

basePath('src/Authenticator/Auth.php');
basePath('src/Configuration/Database.php');

class TaskQuery
{

    /**
     * fetch particular record from database table
     * @return array
     */
    public function select(): array
    {
        return (new Database)->query(query: "select * from tasks where user_id = :user_id order by date asc", parameter: [
            'user_id' => $_SESSION['user']['id'] ?? false
        ])->fetchAll();
    }

    /**
     * insert data in database table
     * @return void
     */
    public function insert(): void
    {
        (new Database)->query(
            query: 'insert into tasks ( user_id, name, notification, date, place) values (:user_id , :name, :notification, :timestamp, :place)',
            parameter: [
                'user_id' => $_SESSION['user']['id'],
                'name' => $_POST['name'],
                'notification' => $_POST['notification'],
                'timestamp' => date("Y-m-d ") . $_POST['timestamp'] . date(":s"),
                'place' => $_POST['place']
            ]
        );
    }

    /**
     * delete record from database table
     */
    public function delete(): void
    {
        (new Database)->query(query: 'delete from tasks where date <= DATE_SUB(NOW(), INTERVAL 1 DAY) or id = :id', parameter: [
            'id' => $_POST['id']
        ]);
    }

    /**
     * give one record from database and update that
     * @return void 
     */
    public function update(): void
    {
        (new Database)->query(query: 'update tasks set name = :name, notification = :notification, place = :place, date = :date where id = :id', parameter: [
            'id' => $_POST['id'] ?? null,
            'name' => $_POST['name'],
            'notification' => $_POST['notification'],
            'place' => $_POST['place'],
            'date' => $_POST['date']
        ]);
    }
}
