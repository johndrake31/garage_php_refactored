<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


//on récupère les librairies nécéssaires
require_once "core/autoloading.php";

\App::process();
