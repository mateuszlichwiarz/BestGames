<?php

if(!isset($_POST['delivery']) && !isset($_SESSION['logged']) && !isset($_SESSION['uid']))
{

    die('YOU SHALL NOT PASS!');

} else {

    if($_POST['delivery'] == 'pobranie') {

        ProductManager::updateBasket("delivery", $_POST['delivery']);
        ProductManager::updateBasket("payment", $_POST['delivery']);
        header('Location: ordersummary');

    } else {
        ProductManager::updateBasket("delivery", $_POST['delivery']);
        ModuleLoader::load('open');
        ModuleLoader::load('logo');
        ModuleLoader::load('nav');
        ModuleLoader::load('payment');
        ModuleLoader::load('footer');
        Moduleloader::load('js');
        ModuleLoader::load('close');
}

}

?>