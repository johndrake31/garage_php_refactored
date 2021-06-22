<?php
spl_autoload_register(
    function ($nomDeClass) {
        $nomDeClassFixed = str_replace("\\", "/", $nomDeClass);
        require_once "core/$nomDeClassFixed.php";
    }
);
