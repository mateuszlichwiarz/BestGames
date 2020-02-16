<?php

if(isset($_SESSION['logged']) && isset($_SESSION['uid'])) {

    $um = new UserManager;
    $um->log_out();

    header("Location: ".SERVER_ADDRESS."accountlogin");
} else {

    die("Wystąpił błąd");
    
}