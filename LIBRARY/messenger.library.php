<?php

if(!isset($_SESSION['logged']) && !isset($_SESSION['uid']))
{
    ModuleLoader::load('open');
    ModuleLoader::load('logo');
    ModuleLoader::load('nav');
    echo '<div class="content"><h2>Aby skorzystać z tej sekcji musisz posiadać konto oraz być zalogowanym w tym serwisie.</h2></div>';
    ModuleLoader::load('footer');
    Moduleloader::load('js');
    ModuleLoader::load('close');

} else 
{
    ModuleLoader::load('open');
    ModuleLoader::load('logo');
    ModuleLoader::load('nav');
    ModuleLoader::load('messenger');
    ModuleLoader::load('footer');
    Moduleloader::load('js');
    ModuleLoader::load('close');
}