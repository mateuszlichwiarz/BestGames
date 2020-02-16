<?php
 
 ModuleLoader::load('open');
 ModuleLoader::load('logo');
 ModuleLoader::load('nav');

if(!isset($_SESSION['uid']) && !isset($_SESSION['logged'])) {
    ModuleLoader::load('notlogged');
} else {

    ModuleLoader::load('orders');
}

ModuleLoader::load('footer');
ModuleLoader::load('js');
ModuleLoader::load('close');