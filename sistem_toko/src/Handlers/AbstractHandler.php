<?php
namespace App\Handlers;

abstract class AbstractHandler {
    protected $pdo;

    public function __construct()
    {
        $this->pdo = new \PDO('mysql:host=localhost;dbname=sistem_toko', 'root', '');
    }
}
