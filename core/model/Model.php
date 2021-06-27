<?php

namespace Model;

use PDO;

abstract class Model
{

    protected $pdo;
    protected $table;
    function __construct()
    {
        $this->pdo = \Database::getPdo();
    }


    /**
     * trouver un item par son id
     * renvoie un tableau contenant un array, ou un booleen
     * si inexistant
     * 
     * @param integer $id
     * @return array|bool
     */
    public function find(int $id, $className)
    {
        $maRequete = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id =:id");

        $maRequete->execute(['id' => $id]);

        $item = $maRequete->fetchObject($className);

        return $item;
    }
    /**
     * retourne un tableau contenant tous les items de 
     * la table demander
     * 
     * @return array
     */
    public function findAll(string $className): array
    {
        $resultat =  $this->pdo->query("SELECT * FROM {$this->table}");
        $item = $resultat->fetchAll(PDO::FETCH_CLASS, $className);
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
