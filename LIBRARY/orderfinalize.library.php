<?php

if(!isset($_POST['status']) && !isset($_SESSION['logged']) && !isset($_SESSION['uid']))
{

    die('YOU SHALL NOT PASS!');

} else 
{
    
    ModuleLoader::load('open');
    ModuleLoader::load('logo');
    ModuleLoader::load('nav');
    ModuleLoader::load('finalize');
    ModuleLoader::load('footer');
    Moduleloader::load('js');
    ProductManager::sendFinalizeEmail();
    ModuleLoader::load('close');
}