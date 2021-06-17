<?php
require_once "core/database.php";
require_once "core/utils.php";

$garage_id = null;

if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
    $garage_id = $_GET['id'];
}
if (!$garage_id) {
    die('please enter a number in the url for this to work.');
}

// Find a garage by ID
$pdo = getPdo();

$garage = findGarageById($garage_id);


// ANNONCE SECTION


$annonces = findAnnoncesByGarage($garage_id);


// SECTION TO RENDER


$titreDeLaPage = $garage['name'];

render(
    "garages/garage",
    compact("garage", "titreDeLaPage", "annonces")
);


// ob_start();

// require_once "templates/garages/garage.html.php";

// $contenuDeLaPage = ob_get_clean();

// require_once "templates/layout.html.php";
