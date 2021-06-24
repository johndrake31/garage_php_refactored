<?php

namespace Model;

class Recipe extends Model
{
    protected $table = 'recipes';

    /**
     * returns an array of arrays of cake recipes
     * @param integer $cake_id
     * @return array|boolean 
     */
    public function findAllbyCakeId(int $cake_id)
    {
        $maRequete =  $this->pdo->prepare("SELECT * FROM recipes WHERE cake_id =:cake_id");
        $maRequete->execute(["cake_id" => $cake_id]);
        $items = $maRequete->fetchAll();
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
