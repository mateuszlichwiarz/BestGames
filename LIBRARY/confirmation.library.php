<?php

if(!isset($_SESSION['uid']) && !isset($_POST['status']) && !isset($_SESSION['logged'])) {
    die("Nie powinno Cię tu być");
} else{

    $status = $_POST['status'];
    $num = $_POST['num'];

    ProductManager::updateStatus($num);

    ModuleLoader::load('open');
    ModuleLoader::load('logo');
    ModuleLoader::load('nav');
    ModuleLoader::load('confirmation');
    ModuleLoader::load('footer');
    ModuleLoader::load('js');
    ModuleLoader::load('close');
}
