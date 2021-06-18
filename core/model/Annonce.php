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
        $maRequete =  $this->pdo->prepare("SELECT * FROM `annonce` WHERE garage_id =:garage_id");
        $maRequete->execute(['garage_id' => $garage_id]);
        $item = $maRequete->fetchAll();
        return $item;
    }

    /**
     * searches for and returns an array of one listing from the sql BDD
     * by id.
     * @param integer $id
     * @return array|boolean  sql table or boolean.
     */
    public function find(int $id)
    {

        $maRequete =  $this->pdo->prepare("SELECT * FROM `annonce` where id =:id");
        $maRequete->execute(['id' => $id]);
        $item = $maRequete->fetch();
        return $item;
    }

    /**
     * selects an item by id and deletes it from the BDD
     * @param integer $id
     * @return void
     */
    public function delete(int $id): void
    {
        $maRequete =  $this->pdo->prepare("DELETE FROM `annonce` WHERE id =:id");
        $maRequete->execute(['id' => $id]);
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
        $maRequete = $this->pdo->prepare("INSERT INTO `annonce` (`name`, `price`, `garage_id`) VALUES (:name, :price, :garage_id)");
        $maRequete->execute(['name' => $name, 'price' => $price, 'garage_id' => $garage_id]);
    }
}
