<?php

     if(isset($_SESSION['logged']) && isset($_POST['data']) && isset($_POST['token'])){

        ModuleLoader::load('open');
        ModuleLoader::load('logo');
        ModuleLoader::load('nav');
        ModuleLoader::load('update');
        ModuleLoader::load('footer');
        ModuleLoader::load('js');
        ModuleLoader::load('close');
        }