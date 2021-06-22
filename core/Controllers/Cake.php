<?php

namespace Controllers;


class Cake extends Controller
{

    protected $modelName = \Model\Cake::class;





    /**
     * afficher l'accueil du site
     * 
     * 
     */
    public function index()
    {
        //on recupère tous les cakes
        $cakes = $this->model->findAll();

        //on fixe le titre de la page
        $titreDeLaPage = "Cakes";

        //on affiche
        \Rendering::render(
            "cakes/cakes",
            compact('cakes', 'titreDeLaPage')
        );
    }

    /**
     * 
     * 
     * 
     */

    public function show()
    {
        $cake_id = null;

        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $cake_id = $_GET['id'];
        }
        if (!$cake_id) {
            die('please enter a number in the url for this to work.');
        }

        // Find a garage by ID
        $cake = $this->model->find($cake_id);

        // SECTION TO RENDER

        $titreDeLaPage = $cake['name'];

        \Rendering::render(
            "cakes/cake",
            compact("cake", "titreDeLaPage")
        );
    }


    /**
     * 
     * 
     * 
     */
    public function suppr(): void
    {
        $cake_id = null;

        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $cake_id = $_GET['id'];
        }
        if (!$cake_id) {
            die('please enter a proper number  in the url for this to delete.');
        }


        $cake_to_delete = $this->model->find($cake_id);

        if (!$cake_to_delete) {
            die("Does Not Exist");
        }

        $this->model->delete($cake_id);

        \Http::redirect("index.php?controller=cake&task=index");
    }
}
