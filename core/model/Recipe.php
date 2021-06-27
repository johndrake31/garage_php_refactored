<?php

namespace Model;

use PDO;

class Recipe extends Model
{
    protected $table = 'recipes';

    public $id;
    public $name;
    public $description;
    public $cake_id;
    public $date_added;


    public function getMakes()
    {
        $modelMakes = new \Model\Make();
        $nbrOfMakes = $modelMakes->findAllByRecipe($this->id);
        return $nbrOfMakes;
    }

    // public function createMakes()
    // {
    //     $modelMakes = new \Model\Make();
    //     $nbrOfMakes = $modelMakes->insertMake($this->id, "recipe_id");
    //     $nbrOfMakes = $modelMakes->findAllByRecipe($this->id);
    //     return $nbrOfMakes;
    // }

    /**
     * returns an array of arrays of cake recipes
     * @param integer $cake_id
     * @return array|boolean 
     */
    public function findAllbyCakeId(int $cake_id, $className)
    {
        $maRequete =  $this->pdo->prepare("SELECT * FROM recipes WHERE cake_id =:cake_id");
        $maRequete->execute(["cake_id" => $cake_id]);
        $items = $maRequete->fetchAll(PDO::FETCH_CLASS, $className);
        return $items;
    }

    /**
     * updates a recipe in the BDD
     * @param int $id
     * @param string $name
     * @param string $description
     * @return void
     */
    public function edit(int $id, string $name, string $description): void
    {

        $maRequete = $this->pdo->prepare(
            "UPDATE recipes SET name = :name, description = :description WHERE id = :id"
        );
        $maRequete->execute([
            'name' => $name,
            'description' => $description,
            'id' => $id
        ]);
    }

    /**
     * creates a recipe and inserts it into the BDD
     * @param integer $cake_id
     * @param integer $name
     * @param string $description
     * @return void
     */
    public function insert(string $name, string $description, int $cake_id): void
    {

        $maRequete = $this->pdo->prepare("INSERT INTO recipes (name, description, cake_id) VALUES (:name, :description, :cake_id)");
        $maRequete->execute(['name' => $name, 'description' => $description, 'cake_id' => $cake_id]);
    }
}
