<?php
require_once "core/database.php";
require_once "core/utils.php";
$pdo = getPdo();



$garages = findAllGarages();

$titreDeLaPage = "Garages";

//buffer
// j'active la mémoire tampon
//les instruction suivantes ne seront pas affichées dans la page HTML finale


render(
    "garages/garages",
    compact("garages", "titreDeLaPage")
);
