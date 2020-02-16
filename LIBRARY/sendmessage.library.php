<?php

if(isset($_SESSION['logged']) && isset($_SESSION['uid'])){

    ModuleLoader::load('open');
    ModuleLoader::load('logo');
    ModuleLoader::load('nav');

    if(isset($_POST['reader']) && isset($_POST['message']))
    {
        if(!$_POST['message'] == '')
        {
            $writer = $_SESSION['uid'];
            $reader = $_POST['reader'];
            echo $reader;
            $message = $_POST['message'];
            echo $message;

            $mm = new MessagesManager($message, $writer, $reader);
            $mm->InsertMessage();
            
            if(isset($_POST['token']))
            {
                $_SESSION['reader'] = $_POST['reader'];
                header("Location: ".SERVER_ADDRESS."messenger");
            }else{
                ModuleLoader::load('sendmessage');
            }

        }else 
        {
            echo 'Wiadomość jest pusta.';
        }
    }else
    {
        echo '<div class="content"><h3>Wystąpił błąd</h3></div>';
    }



    ModuleLoader::load('footer');
    ModuleLoader::load('js');
    ModuleLoader::load('close');
}