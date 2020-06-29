<?php

class Http
{
    // redirect('index.php')
    public static function redirect(string $url): void
    {
        $location = sprintf("Location: %s", $url);
        header($location);
        exit();
    }
}