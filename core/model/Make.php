<?php

namespace Model;

class Make extends Model
{

    protected $table = "makes";


    /**
     * returns an array with a listing from makes by cake_id.
     * @param integer $cake_id
     * @return array|boolean sql table on success or boolean if nothing found.
     */
    public function findAllByCake($cake_id)
    {
        $maRequete = $this->pdo->prepare("SELECT * FROM makes WHERE cake_id=:cake_id");
        $maRequete->execute(['cake_id' => $cake_id]);
        $item = $maRequete->rowCount();
        return $item;
    }

    /**
     * 
     */
    public function findAllByRecipe($recipe_id)
    {
        $maRequete = $this->pdo->prepare(" SELECT * FROM makes WHERE recipe_id=:recipe_id");
        $maRequete->execute(['recipe_id' => $recipe_id]);
        $item = $maRequete->rowCount();
        return $item;
    }
    /**
     * Insert a make into the BDD based on column name and id
     * @param int $cake_id or $recipe_id
     * @param string $tablename to insert to.
     * 
     * 
     * @return void
     */
    public function insert(int $id, $tablename): void
    {
        if ($tablename == "cake") {
            $maRequete = $this->pdo->prepare("INSERT INTO makes (cake_id) VALUES (:id)");
        } elseif ($tablename == "recipe") {
            $maRequete = $this->pdo->prepare("INSERT INTO makes (recipe_id) VALUES (:id)");
        }
        $maRequete->execute(['id' => $id]);
    }
}
