<?php

class database
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=discord", "root", "");
    }
    public function getPDO()
    {
        return $this->pdo;
    }
}
$database = new database();
