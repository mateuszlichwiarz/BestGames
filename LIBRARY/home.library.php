<?php

ModuleLoader::load('open');
ModuleLoader::load('logo');
ModuleLoader::load('nav');

if(!isset($_SESSION['logged']) && !isset($_SESSION['uid'])) {

    ModuleLoader::load('home');
    ModuleLoader::load('register');

} else {

    ModuleLoader::load('logged');

}

ModuleLoader::load('footer');
ModuleLoader::load('js');
ModuleLoader::load('close');


?>