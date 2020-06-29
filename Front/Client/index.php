<?php

require_once('../../Back/autoload.php');

if (isset($_GET['controller']) && isset($_GET['action']))
{
    \Application::process();
}
else {
    $pageTitle = "Accueil";
    $pageContent = '<h1>Bienvenue dans le site Creamcode !</h1>';
    require_once('layout.html.php'); 
    }   
?>



