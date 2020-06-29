<?php

class Renderer
{
    public static function render(string $path, array $variables = [])
    {
        extract($variables);
        
        ob_start();
        $path = sprintf("%s.html.php", $path);
        require($path);
        $pageContent = ob_get_clean();

        require('layout.html.php');
        exit();
    }
}