<?php

require_once('../../Back/autoload.php');

if (isset($_GET['controller']) && isset($_GET['action']))
{
    \Application::process();
}
else {
    $pageTitle = "Accueil";
    $pageContent = '<h1>Creamcode - AD</h1>';
    require_once('layout.html.php'); 
    }   
?>



