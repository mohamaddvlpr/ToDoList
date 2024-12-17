<?php

use Configuration\Database;
use Validations\Restriction;
use Query\TaskQuery;

require '../functions.php';

basePath('src/Configuration/Database.php');
basePath('src/Query/TaskQuery.php');
basePath('src/Validations/Restriction.php');

currentTaskUri();

class TaskController
{

    /**  This Method Fetch Main ColumnName in Database From Table
     * @return array
     */
    public function column(): array
    {
        return (new Database)->query(query: "select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'tasks' LIMIT 4 OFFSET 2")
            ->fetchAll();
    }

    /** Fetch All record From Tasks Table
     * @return array
     */
    public function index(): array
    {
        return (new TaskQuery())->select();
    }

    /** return Create View
     * @return void
     */
    public function create(): void
    {
        if (!isset($_SESSION['user']))
            redirect(to: '/');

        viewPath(path: 'tasks/create');
    }

    /** Validate All Input, Then Store all New Resource in Database Table
     * @return void
     */
    public function store(): void
    {
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

        if (! empty($errors)) {
            viewPath(path: 'tasks/create', parameter: [
                'errors' => $errors
            ]);
        } else {
            ((new TaskQuery)->insert());

            redirect(to: '/tasks');
        }
    }

    /**
     * Logging Out And User Session
     * @return void
     */
    public function delete(): void
    {
        (new TaskQuery)->delete();

        redirect(to: '/tasks');
    }

    /**
     * return edit page
     * @return void
     */
    public function edit(): void
    {
        viewPath(path: 'tasks/edit');
    }

    public function update() {}
}
