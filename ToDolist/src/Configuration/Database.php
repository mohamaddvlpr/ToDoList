<?php

namespace Configuration;

basePath('/src/Configuration/Config.php');

use Configuration\Config;
use PDO;

class Database extends Config
{
    const DSN_SOCKET = "unix_socket=/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock;";
    protected $conn = null;
    protected  $statement;

    public function __construct()
    {

        $dsn = "mysql:" . self::DSN_SOCKET . "host=" . $this->dbHost . ";dbname=" . $this->dbName . ";charset=UTF8";

        $this->conn = new PDO($dsn, $this->dbUser, $this->dbPass, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        return $this;
    }

    /**
     * Write query to working with Database
     * @return Database
     */
    public function query($query, $parameter = []): Database
    {
        $this->statement = $this->conn->prepare($query, $parameter);
        $this->statement->execute($parameter);

        return $this;
    }

    /**
     * find and show select information from database
     * @return array
     * @return bool
     */
    public function fetch(): array | bool
    {
        return $this->statement->fetch();
    }

    /**
     * find and show All information from database
     * @return array
     */
    public function fetchAll(): array
    {
        return $this->statement->fetchAll();
    }

    /**
     * find or return response code
     * @return array | null
     */
    public function fetchOrFail(): array | null
    {
        return $this->fetch() ?? abort(404);
    }
}
