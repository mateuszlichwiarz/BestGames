<?php

    if(isset($_POST['forename'])   && isset($_POST['surname']) 
        && isset($_POST['city'])   && isset($_POST['zipcode']) 
        && isset($_POST['street']) && isset($_POST['phone']))
        {
            $um = new UserManager;
            $res = $um->InsertUser($_POST);

            if($res) {
                header("Location: ".SERVER_ADDRESS."account");
            } else {
                echo "<br>Dodanie danych do bazy nie było możliwe";
            }
        }