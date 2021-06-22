<?php

class Database
{

    /**
     * create a connection with the BDD
     *@return PDO|boolean connection sql or boolean if no connection.
     */
    public static function getPdo(): PDO
    {
        $pdo = new PDO('mysql:host=localhost;dbname=garagepoo', 'garage', 'garage', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);

        return $pdo;
    }
}
