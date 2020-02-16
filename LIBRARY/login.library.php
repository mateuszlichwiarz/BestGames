<?php

if(isset($_POST['username']) && isset($_POST['password'])) {
    
    $um = new UserManager;

    if($um->LogIn($_POST['username'], $_POST['password'])) {
        
        $username = $_POST['username'];
        $select = DatabaseManager::selectBySQL("SELECT username FROM users WHERE admin='1'");
        if($select == true){
            foreach($select as $key)
            {
                if($key[0] == $username){
                    $_SESSION['admin'] = true;
                }
            }
        }
        
        header("Location: ".SERVER_ADDRESS."home");
        
    } else {

        header("Location: ".SERVER_ADDRESS."accountlogin");

    }
} else {
    header("Location: ".SERVER_ADDRESS."accountlogin");
}