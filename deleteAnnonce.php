<?php
require_once "core/utils.php";
require_once "core/model/Annonce.php";

$annonce_id = null;
//effacer le garage
if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
    $annonce_id = $_GET['id'];
}
if (!$annonce_id) {
    die('please enter a proper number  in the url for this to delete.');
}

$model = new Annonce();
$annonce_to_delete = $model->find($annonce_id);

if (!$annonce_to_delete) {
    die("Does Not Exist");
}

$garage_id = $annonce_to_delete['garage_id'];

$model->delete($annonce_id);

redirect("garage.php?id=$garage_id");
