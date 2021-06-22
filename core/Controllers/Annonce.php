<?php

namespace Controllers;

require_once "core/utils.php";
require_once "core/Model/Annonce.php";
require_once "core/Model/Garage.php";
require_once "core/Contollers/Controller.php";

class Annonce extends Controller
{
    protected $modelName = \Model\Annonce::class;
    public function suppr()
    {

        $annonce_id = null;
        //effacer le garage
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $annonce_id = $_GET['id'];
        }
        if (!$annonce_id) {
            die('please enter a proper number  in the url for this to delete.');
        }


        $annonce_to_delete = $this->model->find($annonce_id);

        if (!$annonce_to_delete) {
            die("Does Not Exist");
        }

        $garage_id = $annonce_to_delete['garage_id'];

        $this->model->delete($annonce_id);

        redirect("garage.php?id=$garage_id");
    }


    public function save()
    {

        $garage_id = null;
        $name = null;
        $price = null;

        if (!empty($_POST['garageId']) && ctype_digit($_POST['garageId'])) {
            $garage_id = $_POST['garageId'];
        }
        if (!empty($_POST['name'])) {
            $name = htmlspecialchars($_POST['name']);
        }
        if (!empty($_POST['price'])) {
            $price = htmlspecialchars($_POST['price']);
        }
        if (!$garage_id || !$name || !$price) {
            die("formulaire mal rempli");
        }
        $modelGarage = new \Model\Garage();

        $garage = $modelGarage->find($garage_id, 'garages');

        if (!$garage) {
            die("garage inexistant");
        }

        $this->model->insert($name, $price, $garage_id);

        redirect("garage.php?id=$garage_id");
    }
}
