<?php

$select = DatabaseManager::selectBySQL("SELECT admin FROM users WHERE id='{$_SESSION['uid']}'");
foreach($select as $arr){
    $data = $arr;
}

if($data['admin'] == true)
{
    $status = $_POST['status'];

    $adminstatus = $_POST['adminstatus'];

    ModuleLoader::load('open');
    ModuleLoader::load('logo');
    ModuleLoader::load('nav');
    ModuleLoader::load('orderlist');
    ModuleLoader::load('footer');
    ModuleLoader::load('js');
    ModuleLoader::load('close');
} else {
    die('NIE PRZEJDZIESZ!');
}