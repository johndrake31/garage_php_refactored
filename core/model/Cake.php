<?php

namespace Model;

class Cake extends Model
{
    protected $table = 'cakes';

    public $id;
    public $title;
    public $flavor;
    public $description;

    /**
     * getMakes seaches bdd by cake id and returns an integer count of all 
     * affiliated "makes".
     * @param none
     * @return integer
     */
    public function getMakes(): int
    {
        $modelMakes = new \Model\Make();
        $nbrOfMakes = $modelMakes->findAllByCake($this->id);
        return $nbrOfMakes;
    }



    /**
     * creates a cake and inserts it into the BDD
     * @param string $title
     * @param string $flavor
     * @param string $description
     * @return void
     */
    public function insert(string $title, string $flavor, string $description): void
    {
        $maRequete = $this->pdo->prepare("INSERT INTO `cakes` (`title`, `flavor`, `description`) VALUES (:title, :flavor, :description)");
        $maRequete->execute([
            'title' => $title,
            'flavor' => $flavor,
            'description' => $description
        ]);
    }


    /**
     * updates a cake in the BDD
     * @param int $id
     * @param string $title
     * @param string $flavor
     * @param string $description
     * @return void
     */
    public function edit(
        int $id,
        string $title,
        string $flavor,
        string $description
    ): void {

        $maRequete = $this->pdo->prepare(
            "UPDATE cakes SET title = :title, flavor = :flavor, description = :description WHERE id = :id"
        );
        $maRequete->execute([
            'title' => $title,
            'flavor' => $flavor,
            'description' => $description,
            'id' => $id
        ]);
    }
}
