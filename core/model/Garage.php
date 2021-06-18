<?php

require_once "core/database.php";
require_once "core/model/Model.php";

class Garage extends Model
{

    /**
     * retourne un tableau contenant tous les garages de 
     * la table garages
     * 
     * @return array
     */
    public function findAll(): array
    {
        $resultat =  $this->pdo->query('SELECT * FROM garages');

        $item = $resultat->fetchAll();

        return $item;
    }

    /**
     * trouver un garage par son id
     * renvoie un tableau contenant un garage, ou un booleen
     * si inexistant
     * 
     * @param integer $id
     * @return array|bool
     */
    public function find(int $id)
    {
        $maRequete = $this->pdo->prepare("SELECT * FROM garages WHERE id =:id");

        $maRequete->execute(['id' => $id]);

        $item = $maRequete->fetch();

        return $item;
    }

    /**
     * supprime un garage via son ID
     * @param integer $id
     * @return void
     */
    public function delete(int $id): void
    {
        $maRequete = $this->pdo->prepare("DELETE FROM garages WHERE id =:id");

        $maRequete->execute(['id' => $id]);
    }
}
