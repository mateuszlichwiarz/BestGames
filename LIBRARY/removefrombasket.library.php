<?php

if(isset($_POST['pid'])) {

    ProductManager::removeFromBasket($_POST['pid']);

} else {
    header("Location: ".SERVER_ADDRESS."basket");
};