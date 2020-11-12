<?php

require_once ('config.php');

class Database
{
    private $conn;
    public function __construct()
    {
        $this->conn = mysqli_connect(DB_HOST,DB_USER, DB_PASS, DB_NAME);
        if(!$this->conn){
            echo 'Connection error: ' . mysqli_connect_error();
        }
    }
    public function __destruct()
    {
        mysqli_close($this->conn);
    }
    public function query($sql)
    {
        return mysqli_query($this->conn, $sql);
    }

    public function getConnection()
    {
        return $this->conn;
    }
}