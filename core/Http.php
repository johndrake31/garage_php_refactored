<?php
class Http
{

    /**
     * 
     * redirect towards the url passed into the function
     * default index redirects towards home page.
     * 
     * @param string $myString
     * @return void
     */
    public static function redirect(string $myString = "index.php"): void
    {
        header("Location: $myString");
    }
}
