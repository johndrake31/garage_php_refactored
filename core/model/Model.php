<?php

namespace Model;

require_once "core/database.php";

abstract class Model
{

    protected $pdo;
    protected $table;
    function __construct()
    {
        $this->pdo = getPdo();
    }


    /**
     * trouver un item par son id
     * renvoie un tableau contenant un array, ou un booleen
     * si inexistant
     * 
     * @param integer $id
     * @return array|bool
     */
    public function find(int $id)
    {
        $maRequete = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id =:id");

        $maRequete->execute(['id' => $id]);

        $item = $maRequete->fetch();

        return $item;
    }
    /**
     * retourne un tableau contenant tous les items de 
     * la table demander
     * 
     * @return array
     */
    public function findAll(): array
    {
        $resultat =  $this->pdo->query("SELECT * FROM {$this->table}");
        $item = $resultat->fetchAll();
        return $item;
    }



    /**
     * supprime un garage via son ID
     * @param integer $id
     * @return void
     */
    public function delete(int $id): void
    {
        $maRequete = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id =:id");

        $maRequete->execute(['id' => $id]);
    }
}
