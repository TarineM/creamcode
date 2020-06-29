<?php

spl_autoload_register(function($className)
{
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    $fileAutoload = sprintf("../../Back/%s.php", $className);
    require_once($fileAutoload);
});