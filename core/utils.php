<?php

/**
 * 
 * redirect towards the url passed into the function
 * default index redirects towards home page.
 * 
 * @param string
 */


function redirect(string $myString = "index.php"): void
{
    header("Location: $myString");
}

/**
 * 
 * 
 * 
 * @param string
 * @param array
 */
function render(string $template, array $donnes): void

{
    extract($donnes);

    ob_start();

    require_once "templates/$template.html.php";
    //et ce jusqu'à ce qu'on désactive la memoire tampon
    //au passage, on récupère son contenu (et donc garages.html.php) pour 
    //le stocker dans la variable $contenuDeLaPage

    $contenuDeLaPage = ob_get_clean();

    require_once "templates/layout.html.php";
}
