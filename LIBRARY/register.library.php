<?php

if((strlen($_POST['username']) >= 5 && strlen($_POST['username']) <= 20) &&
   (strlen($_POST['password']) >= 5 && strlen($_POST['password']) <= 25) &&
   (preg_match('/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i', $_POST['email']))) {

        $um = new UserManager;

        $res = $um->CreateUser($_POST);

        if($res) {
            $um->LogIn($_POST['username'], $_POST['password']);
            header("Location: ".$_SERVER['HTTP_REFERER']);
        } else {
            
            header("Location: ".SERVER_ADDRESS."registererror");

        }
   } else {
    header("Location: ".SERVER_ADDRESS."registererror");
   }