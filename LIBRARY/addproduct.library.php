<?php

if( isset($_POST['name']) && 
    isset($_POST['platform']) && 
    isset($_POST['typeof']) && 
    isset($_POST['PEGI']) &&
    isset($_POST['price']))
{
    ProductManager::SaveImg($_POST);
    ProductManager::AddProduct($_POST);
    ModuleLoader::load('open');
    ModuleLoader::load('logo');
    ModuleLoader::load('nav');
    ModuleLoader::load('correct');
    ModuleLoader::load('footer');
    ModuleLoader::load('js');
    ModuleLoader::load('close');

} else
{
    header("Location: ".SERVER_ADDRESS."addpanelError");
}