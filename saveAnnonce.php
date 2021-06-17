<?php
require_once "core/database.php";
require_once "core/utils.php";

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

$pdo = getPdo();


$garage = findGarageById($garage_id);

if (!$garage) {
    die("garage inexistant");
}


insertAnnonce($name, $price, $garage_id);

redirect("garage.php?id=$garage_id");


    // if ($annonce) {
    //     header("Location: garage.php?id=$garage_id");
    // } else {
    //     die('somehting went wrong with the insert');
    // }
