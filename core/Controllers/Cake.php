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
        $cakes = $this->model->findAll($this->modelName);

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

        // Find a cake by ID
        $cake = $this->model->find($cake_id, $this->modelName);



        // ANNONCE SECTION
        $modelRecipe = new \Model\Recipe();


        $recipes = $modelRecipe->findAllbyCakeId($cake_id, \Model\Recipe::class);


        // SECTION TO RENDER

        $titreDeLaPage = $cake->title;

        \Rendering::render(
            "cakes/cake",
            compact("cake", "titreDeLaPage", 'recipes',)
        );
    }



    /**
     * function deletes an item by id
     * @param none
     * @return none
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


    public function save()
    {

        $title = null;
        $flavor = null;
        $description = null;

        if (!empty($_POST['title']) && $_POST['title'] != "") {
            $title = $_POST['title'];
        }
        if (!empty($_POST['flavor'])) {
            $flavor = htmlspecialchars($_POST['flavor']);
        }
        if (!empty($_POST['description'])) {
            $description = htmlspecialchars($_POST['description']);
        }
        if (!$title || !$flavor || !$description) {
            die("formulaire mal rempli");
        }

        $this->model->insert($title, $flavor, $description);

        \Http::redirect("index.php?controller=cake&task=index");
    }

    /**
     * 
     * 
     * 
     */
    public function update()
    {

        $id = null;
        $title = null;
        $flavor = null;
        $description = null;

        if (!empty($_POST['id']) && ctype_digit($_POST['id'])) {
            $id = $_POST['id'];
        }
        if (!empty($_POST['title']) && $_POST['title'] != "") {
            $title = htmlspecialchars($_POST['title']);
        }
        if (!empty($_POST['flavor'])) {
            $flavor = htmlspecialchars($_POST['flavor']);
        }
        if (!empty($_POST['description'])) {
            $description = htmlspecialchars($_POST['description']);
        }
        if (!$id || !$title || !$flavor || !$description) {
            die("formulaire mal rempli $id, $title, $flavor, $description");
        }

        $cake_to_edit = $this->model->find($id);

        if (!$cake_to_edit) {
            die("Does Not Exist");
        }

        $this->model->edit($id, $title, $flavor, $description);

        \Http::redirect("index.php?controller=cake&task=show&id=$id");
    }
}
