<?php


//on récupère les librairies nécéssaires

require_once "core/Controllers/Garage.php";
$controller = new \Controllers\Garage();

$controller->index();
