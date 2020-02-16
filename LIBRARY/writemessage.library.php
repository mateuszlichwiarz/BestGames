<?php

if(isset($_SESSION['logged']) && isset($_SESSION['uid'])){

    ModuleLoader::load('open');
    ModuleLoader::load('logo');
    ModuleLoader::load('nav');

    if(isset($_POST['id']))
    {
        
        ModuleLoader::load('writemessage');
        

    }else
    {
        echo '<div class="content"><h3>Wystąpił błąd</h3></div>';
    }



    ModuleLoader::load('footer');
    ModuleLoader::load('js');
    ModuleLoader::load('close');
}