<?php

class Renderer
{
    public static function render(string $path, array $variables = [])
    {
        extract($variables);
        
        ob_start();
        require($path . '.html.php');
        $pageContent = ob_get_clean();

        $logoPath = '../../Back/Pictures/logo-cream-code.png';

        require('layout.html.php');
        exit();
    }
}