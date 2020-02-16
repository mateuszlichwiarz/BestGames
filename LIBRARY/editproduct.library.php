<?php

    $select = DatabaseManager::selectBySQL("SELECT admin FROM users WHERE id='{$_SESSION['uid']}'");
    foreach($select as $arr){
        $data = $arr;
    }

    if($data['admin'] == true && isset($_POST))
    {

        ModuleLoader::load('open');
        ModuleLoader::load('logo');
        ModuleLoader::load('nav');

            $id = $_POST['id'];

            if(isset($_POST['pegi'])){

                $pegi = $_POST['pegi'];
                ProductManager::update($pegi, 'PEGI', $id, 'produkty');
                ModuleLoader::load('editproduct');

            }elseif(isset($_POST['price'])){

                $price = $_POST['price'];
                ProductManager::update($price, 'price', $id, 'produkty');
                ModuleLoader::load('editproduct');

            }elseif(isset($_POST['quantity'])){

                $quantity = $_POST['quantity'];
                ProductManager::update($quantity, 'quantity', $id, 'produkty');
                ModuleLoader::load('editproduct');

            }elseif(isset($_POST['premiere'])){

                $premiere = $_POST['premiere'];
                ProductManager::update($premiere, 'premiere', $id, 'produkty');
                ModuleLoader::load('editproduct');

            }elseif(isset($_POST['producer'])){

                $producer = $_POST['producer'];
                ProductManager::update($producer, 'producer', $id, 'produkty');
                ModuleLoader::load('editproduct');

            }elseif(isset($_POST['description'])){

                $description = $_POST['description'];
                ProductManager::update($description, 'description', $id, 'produkty');
                ModuleLoader::load('editproduct');

            }

        
        
        ModuleLoader::load('footer');
        ModuleLoader::load('js');
        ModuleLoader::load('close');
    }else {
        die('NIE PRZEJDZIESZ!');
    }