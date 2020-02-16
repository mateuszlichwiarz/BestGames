<?php

if(!isset($_SESSION['logged']) && !isset($_SESSION['uid']))
{

    die('YOU SHALL NOT PASS!');

} else {

    $select = DatabaseManager::selectBySQL("SELECT * FROM basket WHERE uid='{$_SESSION['uid']}'");
    foreach($select as $arr) {
        $data = $arr;
    }

    $delivery = $data['delivery'];

    if($delivery == 'pobranie') {
        ProductManager::updateBasket('payment', $delivery);
    }else {

        ProductManager::updateBasket('payment', $_POST['payment']);
    }

    ModuleLoader::load('open');
    ModuleLoader::load('logo');
    ModuleLoader::load('nav');
    ModuleLoader::load('summary');
    ModuleLoader::load('footer');
    Moduleloader::load('js');
    ModuleLoader::load('close');
    
}
