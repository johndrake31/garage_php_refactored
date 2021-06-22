<?php

namespace Model;

class Annonce extends Model
{

    protected $table = 'annonce';
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
