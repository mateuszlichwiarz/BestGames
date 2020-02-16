<?php

    if(!isset($_SESSION['logged']) && !isset($_SESSION['uid'])) {
        die("Nie powinno Cię tu być");
    } else {

        ModuleLoader::load('open');
        ModuleLoader::load('logo');
        ModuleLoader::load('nav');
        ModuleLoader::load('viewuser');
        ModuleLoader::load('footer');
        ModuleLoader::load('js');
        ModuleLoader::load('close');
        
    }