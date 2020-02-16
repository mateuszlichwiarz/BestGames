<?php

    ModuleLoader::load('open');
    ModuleLoader::load('logo');
    ModuleLoader::load('nav');
    if(isset($_SESSION['logged']) && isset($_POST['token']) && isset($_POST['data']) && isset($_POST['value']))
    {
        $token = $_POST['token'];
        $data = $_POST['data'];
        $value = $_POST['value'];

        $um = new UserManager;
        $res = $um->UpdateUser($data, $token, $value);

        
        if($res){
            ModuleLoader::load('updatecorrect');
        }else{
            ModuleLoader::load('updatenot');
        }
    }else{
        ModuleLoader::load('updatenotlog');
    }

        ModuleLoader::load('footer');
        ModuleLoader::load('js');
        ModuleLoader::load('close');