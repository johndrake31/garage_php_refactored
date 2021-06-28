<?php

namespace Controllers;

class Make extends Controller
{
    protected $modelName = \Model\Make::class;



    //   if cake_id

    public function addMakeCake()
    {
        $cake_id = null;
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $cake_id = $_GET['id'];
        }
        if (!$cake_id) {
            die('please enter a number in the url for this to work.');
        }
        $cake = $this->model->find($cake_id, \Model\Cake::class);
        if (!$cake) {
            die('cake does not exist');
        }

        $this->model->insert($cake_id, 'cake');

        if (!empty($_GET['show']) && $_GET['show'] == 'true') {
            \Http::redirect("index.php?controller=cake&task=show&id=$cake_id");
        } else {
            \Http::redirect("index.php?controller=cake&task=index");
        }
    }



    public function addMakeRecipe()
    {
        $recipe_id = null;
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $recipe_id = $_GET['id'];
        }
        if (!$recipe_id) {
            die('please enter a number in the url for this to work.');
        }
        $recipeModel = new \Model\Recipe();
        $recipe = $recipeModel->find($recipe_id, \Model\Recipe::class);
        if (!$recipe) {
            die('cake does not exist');
        }

        $cake_id = $recipe->cake_id;

        $this->model->insert($recipe_id, 'recipe');

        if (!empty($_GET['show']) && $_GET['show'] == 'cake') {
            \Http::redirect("index.php?controller=cake&task=show&id=$cake_id");
        } elseif (!empty($_GET['show']) && $_GET['show'] == 'recipe') {
            $titreDeLaPage = $recipe->name;

            \Rendering::render(
                "recipe/recipe",
                compact("titreDeLaPage", 'recipe')
            );
        } else {
            \Http::redirect("index.php?controller=cake&task=index");
        }
    }
}
