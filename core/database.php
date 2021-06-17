<?php

/**
 * create a connection with the BDD
 *@return PDO|boolean connection sql or boolean if no connection.
 */
function getPdo(): PDO
{
    $pdo = new PDO('mysql:host=localhost;dbname=garagepoo', 'garage', 'garage', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    return $pdo;
}

/**
 * returns an array of listings from the garages table
 * @return array|boolean sql table or boolean if data or connection missing.
 */
function findAllGarages()
{
    $pdo = getPdo();
    $maRequest =  $pdo->query("SELECT * FROM `garages`");
    $garages = $maRequest->fetchAll();
    return $garages;
}

/**
 * returns an array with a listing from garages by id.
 * @param int $garage_id
 * @return array|boolean sql table or boolean if nothing found.
 */
function findGarageById(int $garage_id)
{
    $pdo = getPdo();
    $maRequete =  $pdo->prepare("SELECT * FROM `garages` WHERE id =:garage_id");
    $maRequete->execute(['garage_id' => $garage_id]);
    $garage = $maRequete->fetch();
    return $garage;
}

/**
 * selects a garage by id and deletes it from the BDD
 * @param integer $garage_id
 * @return void
 */
function deleteGarageById(int $garage_id): void
{
    $pdo = getPdo();
    $maRequeteDelete =  $pdo->prepare("DELETE FROM `garages` WHERE id =:garage_id");
    $maRequeteDelete->execute(['garage_id' => $garage_id]);
}

/**
 * returns an array with a listing from annonces by garage id.
 * @param integer $garage_id
 * @return array|boolean sql table or boolean if nothing found.
 */
function findAnnoncesByGarage(int $garage_id)
{
    $pdo = getPdo();
    $maRequeteAnnonces =  $pdo->prepare("SELECT * FROM `annonce` WHERE garage_id =:garage_id");
    $maRequeteAnnonces->execute(['garage_id' => $garage_id]);
    $annonces = $maRequeteAnnonces->fetchAll();
    return $annonces;
}

/**
 * searches for and returns an array of one listing from the sql BDD
 * by annonce id.
 * @param integer $annonce_id
 * @return array|boolean  sql table or boolean.
 */
function findAnnonceById(int $annonce_id)
{
    $pdo = getPdo();
    $maRequete =  $pdo->prepare("SELECT * FROM `annonce` where id =:annonce_id");
    $maRequete->execute(['annonce_id' => $annonce_id]);
    $annonce_to_delete = $maRequete->fetch();
    return $annonce_to_delete;
}

/**
 * selects a annonce by id and deletes it from the BDD
 * @param integer $annonce_id
 * @return void
 */
function deleteAnnonceById(int $annonce_id): void
{
    $pdo = getPdo();
    $maRequeteDelete =  $pdo->prepare("DELETE FROM `annonce` WHERE id =:annonce_id");
    $maRequeteDelete->execute(['annonce_id' => $annonce_id]);
}


/**
 * creates a annonce and inserts it into the BDD
 * @param integer $garage_id
 * @param integer $price
 * @param string $name
 * @return void
 */
function insertAnnonce(string $name, int $price, int $garage_id): void
{
    $pdo = getPdo();
    $maRequeteAnnonceC = $pdo->prepare("INSERT INTO `annonce` (`name`, `price`, `garage_id`) VALUES (:name, :price, :garage_id)");

    $maRequeteAnnonceC->execute(['name' => $name, 'price' => $price, 'garage_id' => $garage_id]);
}
