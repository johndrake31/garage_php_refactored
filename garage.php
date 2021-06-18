<?php
require_once "core/utils.php";
require_once "core/model/Garage.php";
require_once "core/model/Annonce.php";

$garage_id = null;

if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
    $garage_id = $_GET['id'];
}
if (!$garage_id) {
    die('please enter a number in the url for this to work.');
}

// Find a garage by ID
$modelGarage = new Garage();
$garage = $modelGarage->find($garage_id);

// ANNONCE SECTION
$modelAnnonce = new Annonce();
$annonces = $modelAnnonce->findAllByGarage($garage_id);

// SECTION TO RENDER

$titreDeLaPage = $garage['name'];

render(
    "garages/garage",
    compact("garage", "titreDeLaPage", "annonces")
);
