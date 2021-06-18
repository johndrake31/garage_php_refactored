<?php

require_once "core/database.php";

abstract class Model
{
    protected $pdo;

    function __construct()
    {
        $this->pdo = getPdo();
    }
}
