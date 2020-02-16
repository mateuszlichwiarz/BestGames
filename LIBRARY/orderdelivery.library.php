<?php

if(!isset($_SESSION['logged']) && !isset($_SESSION['uid']))
{

    ModuleLoader::load('open');
    ModuleLoader::load('logo');
    ModuleLoader::load('nav');
    echo '<div class="content"><h2>Nie powinno Cię tu być.</h2></div>';
    ModuleLoader::load('footer');
    Moduleloader::load('js');
    ModuleLoader::load('close');

} else 
{
    

    ModuleLoader::load('open');
    ModuleLoader::load('logo');
    ModuleLoader::load('nav');
    ModuleLoader::load('delivery');
    ModuleLoader::load('footer');
    Moduleloader::load('js');
    ModuleLoader::load('close');
}