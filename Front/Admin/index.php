<?php

require_once('../../Back/autoload.php');

if (isset($_GET['controller']) && isset($_GET['action']))
{
    \Application::process();
}
else {
    $pageTitle = 'Accueil';
    \Renderer::render('home', compact('pageTitle'));
}


