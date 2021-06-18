<?php
require_once "core/database.php";
require_once "core/utils.php";
require_once "core/model/Garage.php";

$garage_id = null;

if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
    $garage_id = $_GET['id'];
}
if (!$garage_id) {
    die('please enter a proper number  in the url for this to delete.');
}

$model = new Garage();
$garage_to_delete = $model->find($garage_id);

if (!$garage_to_delete) {
    die("Does Not Exist");
}

$model->delete($garage_id);

redirect();
