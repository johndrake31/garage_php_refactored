<?php

namespace Controllers;

class Recipe extends Controller
{

    protected $modelName = \Model\Recipe::class;


    public function suppr()
    {
        $recipe_id = null;

        if (!empty($_POST['id']) && ctype_digit($_POST['id'])) {
            $recipe_id = $_POST['id'];
        }
        if (!$recipe_id) {
            die('please enter a proper number  in the url for this to delete.');
        }


        $recipe_to_delete = $this->model->find($recipe_id);
        $cake_id = $recipe_to_delete['cake_id'];

        if (!$recipe_to_delete) {
            die("Does Not Exist");
        }

        $this->model->delete($recipe_id);

        \Http::redirect("index.php?controller=cake&task=show&id=$cake_id");
    }



    // CREATE A SHOW FOR RECIPE CONTROLLER

    /**
     * 
     * 
     * 
     */

    public function show()
    {
        $recipe_id = null;

        if (!empty($_POST['id']) && ctype_digit($_POST['id'])) {
            $recipe_id = $_POST['id'];
        } else if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $recipe_id = $_GET['id'];
        }
        if (!$recipe_id) {
            die('please enter a number in the url for this to work.');
        }

        // Find a cake by ID
        $recipe = $this->model->find($recipe_id, $this->modelName);


        // SECTION TO RENDER

        $titreDeLaPage = $recipe->name;

        \Rendering::render(
            "recipe/recipe",
            compact("titreDeLaPage", 'recipe')
        );
    }

    /**
     * 
     * 
     * 
     */
    public function update()
    {

        $id = null;
        $name = null;
        $description = null;

        if (!empty($_POST['id']) && ctype_digit($_POST['id'])) {
            $id = $_POST['id'];
        }
        if (!empty($_POST['name']) && $_POST['name'] != "") {
            $name = htmlspecialchars($_POST['name']);
        }

        if (!empty($_POST['description'])) {
            $description = htmlspecialchars($_POST['description']);
        }
        if (!$id || !$name || !$description) {
            die("formulaire mal rempli $id, $name, $description");
        }

        $recipe_to_edit = $this->model->find($id);

        if (!$recipe_to_edit) {
            die("Does Not Exist");
        }

        $this->model->edit($id, $name, $description);

        \Http::redirect("index.php?controller=recipe&task=show&id=$id");
    }

    /**
     * 
     * 
     * 
     */
    public function create()
    {
        $cake_id = null;
        $name = null;
        $description = null;

        if (!empty($_POST['cake_id']) && ctype_digit($_POST['cake_id'])) {
            $cake_id = $_POST['cake_id'];
        }
        if (!empty($_POST['name'])) {
            $name = htmlspecialchars($_POST['name']);
        }
        if (!empty($_POST['description'])) {
            $description = htmlspecialchars($_POST['description']);
        }
        if (!$cake_id || !$name || !$description) {
            die("formulaire mal rempli");
        }

        $modelCake = new \Model\Cake();
        $modelNameCake = \Model\Cake::class;
        $cake = $modelCake->find($cake_id, $modelNameCake);

        if (!$cake) {
            die("cake inexistant");
        }

        $this->model->insert($name, $description, $cake_id);

        \Http::redirect("index.php?controller=cake&task=show&id=$cake_id");
    }
}
