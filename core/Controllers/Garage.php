<?php

namespace Controllers;


class Garage extends Controller
{

    protected $modelName = \Model\Garage::class;





    /**
     * afficher l'accueil du site
     * 
     * 
     */
    public function index()
    {
        //on recupère tous les garages
        $garages = $this->model->findAll();

        //on fixe le titre de la page
        $titreDeLaPage = "Garages";

        //on affiche
        \Rendering::render(
            "garages/garages",
            compact('garages', 'titreDeLaPage')
        );
    }






    public function show()
    {
        $garage_id = null;

        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $garage_id = $_GET['id'];
        }
        if (!$garage_id) {
            die('please enter a number in the url for this to work.');
        }

        // Find a garage by ID
        $garage = $this->model->find($garage_id);

        // ANNONCE SECTION
        $modelAnnonce = new \Model\Annonce();
        $annonces = $modelAnnonce->findAllByGarage($garage_id);

        // SECTION TO RENDER

        $titreDeLaPage = $garage['name'];

        \Rendering::render(
            "garages/garage",
            compact("garage", "titreDeLaPage", "annonces")
        );
    }

    public function suppr()
    {
        $garage_id = null;

        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $garage_id = $_GET['id'];
        }
        if (!$garage_id) {
            die('please enter a proper number  in the url for this to delete.');
        }


        $garage_to_delete = $this->model->find($garage_id);

        if (!$garage_to_delete) {
            die("Does Not Exist");
        }

        $this->model->delete($garage_id);

        \Http::redirect();
    }
}
