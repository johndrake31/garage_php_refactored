<?php

require_once "core/model/Model.php";

class Annonce extends Model
{
    /**
     * returns an array with a listing from annonces by garage id.
     * @param integer $garage_id
     * @return array|boolean sql table or boolean if nothing found.
     */
    public function findAllByGarage(int $garage_id)
    {

        $maRequeteAnnonces =  $this->pdo->prepare("SELECT * FROM `annonce` WHERE garage_id =:garage_id");
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
    public function find(int $annonce_id)
    {

        $maRequete =  $this->pdo->prepare("SELECT * FROM `annonce` where id =:annonce_id");
        $maRequete->execute(['annonce_id' => $annonce_id]);
        $annonce_to_delete = $maRequete->fetch();
        return $annonce_to_delete;
    }

    /**
     * selects a annonce by id and deletes it from the BDD
     * @param integer $annonce_id
     * @return void
     */
    public function delete(int $annonce_id): void
    {

        $maRequeteDelete =  $this->pdo->prepare("DELETE FROM `annonce` WHERE id =:annonce_id");
        $maRequeteDelete->execute(['annonce_id' => $annonce_id]);
    }


    /**
     * creates a annonce and inserts it into the BDD
     * @param integer $garage_id
     * @param integer $price
     * @param string $name
     * @return void
     */
    public function insert(string $name, int $price, int $garage_id): void
    {

        $maRequeteAnnonceC = $this->pdo->prepare("INSERT INTO `annonce` (`name`, `price`, `garage_id`) VALUES (:name, :price, :garage_id)");

        $maRequeteAnnonceC->execute(['name' => $name, 'price' => $price, 'garage_id' => $garage_id]);
    }
}
