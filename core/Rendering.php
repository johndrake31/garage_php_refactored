<?php

class Rendering
{

    /**
     * render recieves a string to pass to the template file path  
     * as a 2nd arguemnt recieves and array of variables 
     * used in the template to render.
     * 
     * @param string $template
     * @param array $donnes
     * @return void
     */
    public static function render(string $template, array $donnes): void
    {
        extract($donnes);
        ob_start();
        require_once "templates/$template.html.php";
        $contenuDeLaPage = ob_get_clean();
        require_once "templates/layout.html.php";
    }
}
