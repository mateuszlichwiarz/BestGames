<?php

class ProductManager
{

    static public function productFilter($POST)
    {
        if(isset($POST['platform']) && isset($POST['type']))
        {

            if($POST['platform'] == 'pc' || $POST['platform'] == 'ps' || 
               $POST['platform'] == 'x' || $POST['platform'] == 'n') 
            {

                if($POST['type'] == 'rpg' || $POST['type'] == 'fps'      || 
                   $POST['type'] == 'rpg' || $POST['type'] == 'strategy' || 
                   $POST['type'] == 'sim' || $POST['type'] == 'sport'    || 
                   $POST['type'] == 'hs' || $POST['type'] == 'logic'    || 
                   $POST['type'] == 'br'  || $POST['type'] == 'fight')
                    {
                    
                        $platform = $POST['platform'];
                        $type     = $POST['type'];

                        $pricemin = $POST['pricemin'];
                        $pricemax = $POST['pricemax'];

                        
                        if(($POST['pricemax'] == true && $POST['pricemin'] == true) && 
                            isset($POST['producer']) && isset($POST['pegi'])) 
                            {

                                $producer = $POST['producer'];
                                $pegi = $POST['pegi'];

                                $q=0;


                                foreach($producer as $arr)
                                {

                                    $selectproducer = DatabaseManager::selectBySQL('SELECT subpage,name,srcimg,price,quantity,PEGI FROM produkty WHERE typeof="'.$type.'" AND platform="'.$platform.'" AND producer="'.$producer[$q].'" AND price BETWEEN '.$pricemin.' AND '.$pricemax);
                                    if($selectproducer == true){
                                    foreach($selectproducer as $arrproducer)
                                    {
                                        $data = $arrproducer;
                                        $w = 0;
                                        foreach($pegi as $arr2)
                                        {
                                            if($pegi[$w] == true){
                                                if($data['PEGI'] == $pegi[$w]) {
                                        
                                                    echo '
                                                        <div class="product">
                                                            <div class="infobox">
                                                                <a href='."{$data['subpage']}".'>
                                                                    <div class="title">
                                                                        <p>'.ucfirst($data['name']).'</p>
                                                                    </div>
                                                                </a>
                                                                <div class="price">
                                                                    <p> Cena: '."{$data['price']}".' zł</p>
                                                                </div>
                                                                <div class="pegi">
                                                                    <p>PEGI: '."{$data['PEGI']}".' </p>
                                                                </div>
                                                                <div class="availability">
                                                                '; if($data['quantity'] > 0) {
                                                                    echo '<p>Produkt dostępny</p>';
                                                                } elseif($data['quantity'] == 0) {
                                                                    echo '<p>Produkt niedostępny</p>';
                                                                }
                                                                echo '
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>

                                                            <div class="img">
                                                                <img src='."{$data['srcimg']}".' width="126px" height="150px">
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                        
                                                        <br><br>

                                                    ';
                                                }
                                            }

                                        $w++;
                                        }

                                    }
                                    }

                                    $q++;
                                }

                            }elseif($POST['pricemin'] == true && 
                                isset($POST['producer']) && isset($POST['pegi']))
                                {

                                    $producer = $POST['producer'];
                                    $pegi = $POST['pegi'];

                                    $q=0;


                                    foreach($producer as $arr)
                                    {

                                        $selectproducer = DatabaseManager::selectBySQL('SELECT subpage,name,srcimg,price,quantity,PEGI FROM produkty WHERE typeof="'.$type.'" AND platform="'.$platform.'" AND producer="'.$producer[$q].'" AND price BETWEEN '.$pricemin.' AND 999');
                                        if($selectproducer == true){
                                        foreach($selectproducer as $arrproducer)
                                        {
                                            $data = $arrproducer;
                                            $w = 0;
                                            foreach($pegi as $arr2)
                                            {
                                                if($pegi[$w] == true){
                                                    if($data['PEGI'] == $pegi[$w]) {
                                            
                                                        echo '
                                                            <div class="product">
                                                                <div class="infobox">
                                                                    <a href='."{$data['subpage']}".'>
                                                                        <div class="title">
                                                                            <p>'.ucfirst($data['name']).'</p>
                                                                        </div>
                                                                    </a>
                                                                    <div class="price">
                                                                        <p> Cena: '."{$data['price']}".' zł</p>
                                                                    </div>
                                                                    <div class="pegi">
                                                                        <p>PEGI: '."{$data['PEGI']}".' </p>
                                                                    </div>
                                                                    <div class="availability">
                                                                    '; if($data['quantity'] > 0) {
                                                                        echo '<p>Produkt dostępny</p>';
                                                                    } elseif($data['quantity'] == 0) {
                                                                        echo '<p>Produkt niedostępny</p>';
                                                                    }
                                                                    echo '
                                                                    </div>
                                                                    <div class="clear"></div>
                                                                </div>

                                                                <div class="img">
                                                                    <img src='."{$data['srcimg']}".' width="126px" height="150px">
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            
                                                            <br><br>

                                                        ';

                                                    }
                                                }

                                            $w++;
                                            }

                                        }
                                        }
                                        $q++;
                                    }
                            
                            

                                }elseif($POST['pricemax'] == true && 
                                    isset($POST['producer']) && isset($POST['pegi']))
                                    {

                                        $producer = $POST['producer'];
                                        $pegi = $POST['pegi'];

                                        $q=0;


                                        foreach($producer as $arr)
                                        {

                                            $selectproducer = DatabaseManager::selectBySQL('SELECT subpage,name,srcimg,price,quantity,PEGI FROM produkty WHERE typeof="'.$type.'" AND platform="'.$platform.'" AND producer="'.$producer[$q].'" AND price BETWEEN 1 AND '.$pricemax);
                                            if($selectproducer == true)
                                            {
                                                foreach($selectproducer as $arrproducer)
                                                {
                                                    $data = $arrproducer;
                                                    $w = 0;
                                                    foreach($pegi as $arr2)
                                                    {
                                                        if($pegi[$w] == true){
                                                            if($data['PEGI'] == $pegi[$w]) {
                                                    
                                                                echo '
                                                                    <div class="product">
                                                                        <div class="infobox">
                                                                            <a href='."{$data['subpage']}".'>
                                                                                <div class="title">
                                                                                    <p>'.ucfirst($data['name']).'</p>
                                                                                </div>
                                                                            </a>
                                                                            <div class="price">
                                                                                <p> Cena: '."{$data['price']}".' zł</p>
                                                                            </div>
                                                                            <div class="pegi">
                                                                                <p>PEGI: '."{$data['PEGI']}".' </p>
                                                                            </div>
                                                                            <div class="availability">
                                                                            '; if($data['quantity'] > 0) {
                                                                                echo '<p>Produkt dostępny</p>';
                                                                            } elseif($data['quantity'] == 0) {
                                                                                echo '<p>Produkt niedostępny</p>';
                                                                            }
                                                                            echo '
                                                                            </div>
                                                                            <div class="clear"></div>
                                                                        </div>

                                                                        <div class="img">
                                                                            <img src='."{$data['srcimg']}".' width="126px" height="150px">
                                                                        </div>
                                                                        <div class="clear"></div>
                                                                    </div>
                                                                    
                                                                    <br><br>

                                                                ';
                                                            }
                                                        }

                                                    $w++;
                                                    }

                                                }
                                            }
                                            $q++;
                                        }

                    
                                }elseif(isset($POST['producer']) && isset($POST['pegi']) && 
                                    ($POST['pricemin'] == false && $POST['pricemax'] == false)) 
                                    {

                                        $producer = $POST['producer'];
                                        $pegi = $POST['pegi'];

                                        $q=0;


                                        foreach($producer as $arr)
                                        {

                                            $selectproducer = DatabaseManager::selectBySQL('SELECT subpage,name,srcimg,price,quantity,PEGI FROM produkty WHERE typeof="'.$type.'"AND platform="'.$platform.'" AND producer="'.$producer[$q].'"');
                                            if($selectproducer == true)
                                            {
                                                foreach($selectproducer as $arrproducer)
                                                {
                                                    $data = $arrproducer;
                                                    $w = 0;
                                                    foreach($pegi as $arr2)
                                                    {
                                                        if($pegi[$w] == true){
                                                            if($data['PEGI'] == $pegi[$w]) {
                                                    
                                                                echo '
                                                                    <div class="product">
                                                                        <div class="infobox">
                                                                            <a href='."{$data['subpage']}".'>
                                                                                <div class="title">
                                                                                    <p>'.ucfirst($data['name']).'</p>
                                                                                </div>
                                                                            </a>
                                                                            <div class="price">
                                                                                <p> Cena: '."{$data['price']}".' zł</p>
                                                                            </div>
                                                                            <div class="pegi">
                                                                                <p>PEGI: '."{$data['PEGI']}".' </p>
                                                                            </div>
                                                                            <div class="availability">
                                                                            '; if($data['quantity'] > 0) {
                                                                                echo '<p>Produkt dostępny</p>';
                                                                            } elseif($data['quantity'] == 0) {
                                                                                echo '<p>Produkt niedostępny</p>';
                                                                            }
                                                                            echo '
                                                                            </div>
                                                                            <div class="clear"></div>
                                                                        </div>

                                                                        <div class="img">
                                                                            <img src='."{$data['srcimg']}".' width="126px" height="150px">
                                                                        </div>
                                                                        <div class="clear"></div>
                                                                    </div>
                                                                    
                                                                    <br><br>

                                                                ';
                                                            }
                                                        }

                                                    $w++;
                                                    }

                                                }
                                            }
                                            $q++;

                                        }

                            
                                }elseif($POST['pricemax'] == true && $POST['pricemin'] == true && isset($POST['producer']))
                                {
                                    
                                    $producer = $POST['producer'];

                                    $q = 0;
                                    

                                    foreach($producer as $arr)
                                    {

                                        $selectproducer = DatabaseManager::selectBySQL('SELECT subpage,name,srcimg,price,quantity,PEGI FROM produkty WHERE typeof="'.$type.'" AND platform="'.$platform.'" AND producer="'.$producer[$q].'" AND price BETWEEN '.$pricemin.' AND '.$pricemax);
                                        if($selectproducer == true){
                                            foreach($selectproducer as $arrproducer)
                                            {
                                                $data = $arrproducer;

                                                echo '
                                                        <div class="product">
                                                            <div class="infobox">
                                                                <a href='."{$data['subpage']}".'>
                                                                    <div class="title">
                                                                        <p>'.ucfirst($data['name']).'</p>
                                                                    </div>
                                                                </a>
                                                                <div class="price">
                                                                    <p> Cena: '."{$data['price']}".' zł</p>
                                                                </div>
                                                                <div class="pegi">
                                                                    <p>PEGI: '."{$data['PEGI']}".' </p>
                                                                </div>
                                                                <div class="availability">
                                                                '; if($data['quantity'] > 0) {
                                                                    echo '<p>Produkt dostępny</p>';
                                                                } elseif($data['quantity'] == 0) {
                                                                    echo '<p>Produkt niedostępny</p>';
                                                                }
                                                                echo '
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>

                                                            <div class="img">
                                                                <img src='."{$data['srcimg']}".' width="126px" height="150px">
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                        
                                                        <br><br>

                                                    ';
                                            }

                                        }

                                        $q++;

                                    }

                            }elseif($POST['pricemax'] == true && isset($POST['producer']))
                            {

                                $producer = $POST['producer'];

                                $q = 0;


                                foreach($producer as $arr)
                                {

                                    $selectproducer = DatabaseManager::selectBySQL('SELECT subpage,name,srcimg,price,quantity,PEGI FROM produkty WHERE typeof="'.$type.'" AND platform="'.$platform.'" AND producer="'.$producer[$q].'" AND price BETWEEN 1 AND '.$pricemax);
                                    if($selectproducer == true){
                                        foreach($selectproducer as $arrproducer)
                                        {
                                            $data = $arrproducer;

                                                echo '
                                                        <div class="product">
                                                            <div class="infobox">
                                                                <a href='."{$data['subpage']}".'>
                                                                    <div class="title">
                                                                        <p>'.ucfirst($data['name']).'</p>
                                                                    </div>
                                                                </a>
                                                                <div class="price">
                                                                    <p> Cena: '."{$data['price']}".' zł</p>
                                                                </div>
                                                                <div class="pegi">
                                                                    <p>PEGI: '."{$data['PEGI']}".' </p>
                                                                </div>
                                                                <div class="availability">
                                                                '; if($data['quantity'] > 0) {
                                                                    echo '<p>Produkt dostępny</p>';
                                                                } elseif($data['quantity'] == 0) {
                                                                    echo '<p>Produkt niedostępny</p>';
                                                                }
                                                                echo '
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>

                                                            <div class="img">
                                                                <img src='."{$data['srcimg']}".' width="126px" height="150px">
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                        
                                                        <br><br>

                                                    ';
                                        }

                                    }

                                    $q++;

                                }

                            }elseif($POST['pricemin'] == true && (isset($POST['producer'])))
                            {

                                $producer = $POST['producer'];

                                $q = 0;


                                foreach($producer as $arr)
                                {

                                    $selectproducer = DatabaseManager::selectBySQL('SELECT subpage,name,srcimg,price,quantity,PEGI FROM produkty WHERE typeof="'.$type.'" AND platform="'.$platform.'" AND producer="'.$producer[$q].'" AND price BETWEEN '.$pricemin.' AND 1000');
                                    if($selectproducer == true){
                                        foreach($selectproducer as $arrproducer)
                                        {
                                            $data = $arrproducer;

                                                echo '
                                                        <div class="product">
                                                            <div class="infobox">
                                                                <a href='."{$data['subpage']}".'>
                                                                    <div class="title">
                                                                        <p>'.ucfirst($data['name']).'</p>
                                                                    </div>
                                                                </a>
                                                                <div class="price">
                                                                    <p> Cena: '."{$data['price']}".' zł</p>
                                                                </div>
                                                                <div class="pegi">
                                                                    <p>PEGI: '."{$data['PEGI']}".' </p>
                                                                </div>
                                                                <div class="availability">
                                                                '; if($data['quantity'] > 0) {
                                                                    echo '<p>Produkt dostępny</p>';
                                                                } elseif($data['quantity'] == 0) {
                                                                    echo '<p>Produkt niedostępny</p>';
                                                                }
                                                                echo '
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>

                                                            <div class="img">
                                                                <img src='."{$data['srcimg']}".' width="126px" height="150px">
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                        
                                                        <br><br>

                                                    ';
                                        }

                                    }

                                    $q++;

                                }
                            

                            }elseif(isset($POST['producer'])) {
                                
                                $producer = $POST['producer'];

                                $q = 0;


                                foreach($producer as $arr)
                                {

                                    $selectproducer = DatabaseManager::selectBySQL('SELECT subpage,name,srcimg,price,quantity,PEGI FROM produkty WHERE typeof="'.$type.'" AND platform="'.$platform.'" AND producer="'.$producer[$q].'"');
                                    if($selectproducer == true) {
                                    foreach($selectproducer as $arrproducer)
                                    {
                                        $data = $arrproducer;

                                                echo '
                                                        <div class="product">
                                                            <div class="infobox">
                                                                <a href='."{$data['subpage']}".'>
                                                                    <div class="title">
                                                                        <p>'.ucfirst($data['name']).'</p>
                                                                    </div>
                                                                </a>
                                                                <div class="price">
                                                                    <p> Cena: '."{$data['price']}".' zł</p>
                                                                </div>
                                                                <div class="pegi">
                                                                    <p>PEGI: '."{$data['PEGI']}".' </p>
                                                                </div>
                                                                <div class="availability">
                                                                '; if($data['quantity'] > 0) {
                                                                    echo '<p>Produkt dostępny</p>';
                                                                } elseif($data['quantity'] == 0) {
                                                                    echo '<p>Produkt niedostępny</p>';
                                                                }
                                                                echo '
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>

                                                            <div class="img">
                                                                <img src='."{$data['srcimg']}".' width="126px" height="150px">
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                        
                                                        <br><br>

                                                    ';
                                        }

                                    }
                                    $q++;
                                }


                            }elseif($POST['pricemin'] == true && $POST['pricemax'] == true && (isset($POST['pegi'])))
                            {

                                $pegi = $POST['pegi'];

                                $q = 0;

                                
                                foreach($pegi as $arr)
                                {
                                    
                                    $selectproducer = DatabaseManager::selectBySQL('SELECT subpage,name,srcimg,price,quantity,PEGI FROM produkty WHERE typeof="'.$type.'" AND platform="'.$platform.'" AND PEGI="'.$pegi[$q].'" AND price BETWEEN '.$pricemin.' AND '.$pricemax);
                                    if($selectproducer == true){
                                        foreach($selectproducer as $arrproducer)
                                        {
                                            $data = $arrproducer;

                                                echo '
                                                        <div class="product">
                                                            <div class="infobox">
                                                                <a href='."{$data['subpage']}".'>
                                                                    <div class="title">
                                                                        <p>'.ucfirst($data['name']).'</p>
                                                                    </div>
                                                                </a>
                                                                <div class="price">
                                                                    <p> Cena: '."{$data['price']}".' zł</p>
                                                                </div>
                                                                <div class="pegi">
                                                                    <p>PEGI: '."{$data['PEGI']}".' </p>
                                                                </div>
                                                                <div class="availability">
                                                                '; if($data['quantity'] > 0) {
                                                                    echo '<p>Produkt dostępny</p>';
                                                                } elseif($data['quantity'] == 0) {
                                                                    echo '<p>Produkt niedostępny</p>';
                                                                }
                                                                echo '
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>

                                                            <div class="img">
                                                                <img src='."{$data['srcimg']}".' width="126px" height="150px">
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                        
                                                        <br><br>

                                                    ';
                                        }

                                    }

                                    $q++;

                                }


                            }elseif($POST['pricemin'] == true && (isset($POST['pegi'])))
                            {

                                $pegi = $POST['pegi'];

                                $q = 0;

                                
                                foreach($pegi as $arr)
                                {
                                    
                                    $selectproducer = DatabaseManager::selectBySQL('SELECT subpage,name,srcimg,price,quantity,PEGI FROM produkty WHERE typeof="'.$type.'" AND platform="'.$platform.'" AND PEGI="'.$pegi[$q].'" AND price BETWEEN '.$pricemin.' AND 1000');
                                    if($selectproducer == true){
                                        foreach($selectproducer as $arrproducer)
                                        {
                                            $data = $arrproducer;

                                                echo '
                                                        <div class="product">
                                                            <div class="infobox">
                                                                <a href='."{$data['subpage']}".'>
                                                                    <div class="title">
                                                                        <p>'.ucfirst($data['name']).'</p>
                                                                    </div>
                                                                </a>
                                                                <div class="price">
                                                                    <p> Cena: '."{$data['price']}".' zł</p>
                                                                </div>
                                                                <div class="pegi">
                                                                    <p>PEGI: '."{$data['PEGI']}".' </p>
                                                                </div>
                                                                <div class="availability">
                                                                '; if($data['quantity'] > 0) {
                                                                    echo '<p>Produkt dostępny</p>';
                                                                } elseif($data['quantity'] == 0) {
                                                                    echo '<p>Produkt niedostępny</p>';
                                                                }
                                                                echo '
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>

                                                            <div class="img">
                                                                <img src='."{$data['srcimg']}".' width="126px" height="150px">
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                        
                                                        <br><br>

                                                    ';
                                        }

                                    }
                                    $q++;

                                }

                            
                            }elseif($POST['pricemax'] == true && (isset($POST['pegi'])))
                            {

                                $pegi = $POST['pegi'];

                                $q = 0;

                                
                                foreach($pegi as $arr)
                                {
                                    
                                    $selectproducer = DatabaseManager::selectBySQL('SELECT subpage,name,srcimg,price,quantity,PEGI FROM produkty WHERE typeof="'.$type.'" AND platform="'.$platform.'" AND PEGI="'.$pegi[$q].'" AND price BETWEEN 1 AND '.$pricemax);
                                    if($selectproducer == true){
                                        foreach($selectproducer as $arrproducer)
                                        {
                                            $data = $arrproducer;

                                                echo '
                                                        <div class="product">
                                                            <div class="infobox">
                                                                <a href='."{$data['subpage']}".'>
                                                                    <div class="title">
                                                                        <p>'.ucfirst($data['name']).'</p>
                                                                    </div>
                                                                </a>
                                                                <div class="price">
                                                                    <p> Cena: '."{$data['price']}".' zł</p>
                                                                </div>
                                                                <div class="pegi">
                                                                    <p>PEGI: '."{$data['PEGI']}".' </p>
                                                                </div>
                                                                <div class="availability">
                                                                '; if($data['quantity'] > 0) {
                                                                    echo '<p>Produkt dostępny</p>';
                                                                } elseif($data['quantity'] == 0) {
                                                                    echo '<p>Produkt niedostępny</p>';
                                                                }
                                                                echo '
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>

                                                            <div class="img">
                                                                <img src='."{$data['srcimg']}".' width="126px" height="150px">
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                        
                                                        <br><br>

                                                    ';
                                        }

                                    }

                                    $q++;

                                }

                                
                            }elseif(isset($POST['pegi'])) {
                                
                                $pegi = $POST['pegi'];

                                $q = 0;

                                
                                foreach($pegi as $arr)
                                {
                                    
                                    $selectproducer = DatabaseManager::selectBySQL('SELECT subpage,name,srcimg,price,quantity,PEGI FROM produkty WHERE typeof="'.$type.'" AND platform="'.$platform.'" AND PEGI="'.$pegi[$q].'"');
                                    if($selectproducer == true){
                                        foreach($selectproducer as $arrproducer)
                                        {
                                            $data = $arrproducer;

                                                echo '
                                                        <div class="product">
                                                            <div class="infobox">
                                                                <a href='."{$data['subpage']}".'>
                                                                    <div class="title">
                                                                        <p>'.ucfirst($data['name']).'</p>
                                                                    </div>
                                                                </a>
                                                                <div class="price">
                                                                    <p> Cena: '."{$data['price']}".' zł</p>
                                                                </div>
                                                                <div class="pegi">
                                                                    <p>PEGI: '."{$data['PEGI']}".' </p>
                                                                </div>
                                                                <div class="availability">
                                                                '; if($data['quantity'] > 0) {
                                                                    echo '<p>Produkt dostępny</p>';
                                                                } elseif($data['quantity'] == 0) {
                                                                    echo '<p>Produkt niedostępny</p>';
                                                                }
                                                                echo '
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>

                                                            <div class="img">
                                                                <img src='."{$data['srcimg']}".' width="126px" height="150px">
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                        
                                                        <br><br>

                                                    ';
                                        }

                                    }

                                    $q++;
                                }

                                
                            }elseif($POST['pricemin'] == true && $POST['pricemax'] == true)
                            {
                                
                                
                                $selectproducer = DatabaseManager::selectBySQL('SELECT subpage,name,srcimg,price,quantity,PEGI FROM produkty WHERE typeof="'.$type.'" AND platform="'.$platform.'" AND price BETWEEN '.$pricemin.' AND '.$pricemax);
                                if($selectproducer == true){
                                    foreach($selectproducer as $arrproducer)
                                    {
                                        $data = $arrproducer;

                                                echo '
                                                        <div class="product">
                                                            <div class="infobox">
                                                                <a href='."{$data['subpage']}".'>
                                                                    <div class="title">
                                                                        <p>'.ucfirst($data['name']).'</p>
                                                                    </div>
                                                                </a>
                                                                <div class="price">
                                                                    <p> Cena: '."{$data['price']}".' zł</p>
                                                                </div>
                                                                <div class="pegi">
                                                                    <p>PEGI: '."{$data['PEGI']}".' </p>
                                                                </div>
                                                                <div class="availability">
                                                                '; if($data['quantity'] > 0) {
                                                                    echo '<p>Produkt dostępny</p>';
                                                                } elseif($data['quantity'] == 0) {
                                                                    echo '<p>Produkt niedostępny</p>';
                                                                }
                                                                echo '
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>

                                                            <div class="img">
                                                                <img src='."{$data['srcimg']}".' width="126px" height="150px">
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                        
                                                        <br><br>

                                                    ';
                                    }
                                }


                            }elseif($POST['pricemin'] == true && $POST['pricemax'] == false)
                            {

                                
                                $selectproducer = DatabaseManager::selectBySQL('SELECT subpage,name,srcimg,price,quantity,PEGI FROM produkty WHERE typeof="'.$type.'" AND platform="'.$platform.'" AND price BETWEEN '.$pricemin.' AND 1000');
                                if($selectproducer == true){
                                    foreach($selectproducer as $arrproducer)
                                    {
                                        $data = $arrproducer;

                                                echo '
                                                        <div class="product">
                                                            <div class="infobox">
                                                                <a href='."{$data['subpage']}".'>
                                                                    <div class="title">
                                                                        <p>'.ucfirst($data['name']).'</p>
                                                                    </div>
                                                                </a>
                                                                <div class="price">
                                                                    <p> Cena: '."{$data['price']}".' zł</p>
                                                                </div>
                                                                <div class="pegi">
                                                                    <p>PEGI: '."{$data['PEGI']}".' </p>
                                                                </div>
                                                                <div class="availability">
                                                                '; if($data['quantity'] > 0) {
                                                                    echo '<p>Produkt dostępny</p>';
                                                                } elseif($data['quantity'] == 0) {
                                                                    echo '<p>Produkt niedostępny</p>';
                                                                }
                                                                echo '
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>

                                                            <div class="img">
                                                                <img src='."{$data['srcimg']}".' width="126px" height="150px">
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                        
                                                        <br><br>

                                                    ';
                                    }
                                }


                            }elseif($POST['pricemin'] == false && $POST['pricemax'] == true)
                            {

                                $selectproducer = DatabaseManager::selectBySQL('SELECT subpage,name,srcimg,price,quantity,PEGI FROM produkty WHERE typeof="'.$type.'" AND platform="'.$platform.'" AND price BETWEEN 1 AND '.$pricemax);
                                if($selectproducer == true){
                                    foreach($selectproducer as $arrproducer)
                                    {
                                        $data = $arrproducer;

                                                echo '
                                                        <div class="product">
                                                            <div class="infobox">
                                                                <a href='."{$data['subpage']}".'>
                                                                    <div class="title">
                                                                        <p>'.ucfirst($data['name']).'</p>
                                                                    </div>
                                                                </a>
                                                                <div class="price">
                                                                    <p> Cena: '."{$data['price']}".' zł</p>
                                                                </div>
                                                                <div class="pegi">
                                                                    <p>PEGI: '."{$data['PEGI']}".' </p>
                                                                </div>
                                                                <div class="availability">
                                                                '; if($data['quantity'] > 0) {
                                                                    echo '<p>Produkt dostępny</p>';
                                                                } elseif($data['quantity'] == 0) {
                                                                    echo '<p>Produkt niedostępny</p>';
                                                                }
                                                                echo '
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>

                                                            <div class="img">
                                                                <img src='."{$data['srcimg']}".' width="126px" height="150px">
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                        
                                                        <br><br>

                                                    ';
                                    }
                                }

                            }elseif($POST['pricemin'] == false && $POST['pricemax'] == false && !isset($POST['producer']) && !isset($POST['pegi']))
                            {
                                $selectproducer = DatabaseManager::selectBySQL('SELECT subpage,name,srcimg,price,quantity,PEGI FROM produkty WHERE typeof="'.$type.'" AND platform="'.$platform.'"');
                                if($selectproducer == true){
                                foreach($selectproducer as $arrproducer)
                                {
                                    $data = $arrproducer;

                                                echo '
                                                        <div class="product">
                                                            <div class="infobox">
                                                                <a href='."{$data['subpage']}".'>
                                                                    <div class="title">
                                                                        <p>'.ucfirst($data['name']).'</p>
                                                                    </div>
                                                                </a>
                                                                <div class="price">
                                                                    <p> Cena: '."{$data['price']}".' zł</p>
                                                                </div>
                                                                <div class="pegi">
                                                                    <p>PEGI: '."{$data['PEGI']}".' </p>
                                                                </div>
                                                                <div class="availability">
                                                                '; if($data['quantity'] > 0) {
                                                                    echo '<p>Produkt dostępny</p>';
                                                                } elseif($data['quantity'] == 0) {
                                                                    echo '<p>Produkt niedostępny</p>';
                                                                }
                                                                echo '
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>

                                                            <div class="img">
                                                                <img src='."{$data['srcimg']}".' width="126px" height="150px">
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                        
                                                        <br><br>

                                                    ';
                                }

                                }
                            }

                    }else
                    {
                        die('Nice try :) Come on, try harder!');
                    }

            }else
            {
                die('Nice try :) Come on, try harder!');
            }

    }else
    {
        die('Nice try :) Come on, try harder!');
    }

    }

    static public function getProductList($platform, $typeof)
    {
            $arr = DatabaseManager::selectBySQL("SELECT subpage,name,srcimg,price,quantity,PEGI FROM produkty WHERE platform='$platform' AND typeof='$typeof'");
            foreach($arr as $key) {
                echo '
                <div class="product">
                    <div class="infobox">
                        <a href='."$key[0]".'>
                            <div class="title">
                                <p>'.ucfirst($key[1]).'</p>
                            </div>
                        </a>
                        <div class="price">
                            <p> Cena: '."$key[3]".' zł</p>
                        </div>
                        <div class="pegi">
                            <p>PEGI: '."$key[5]".' </p>
                        </div>
                        <div class="availability">
                        '; if($key[4] > 0) {
                            echo '<p>Produkt dostępny</p>';
                        } elseif($key[4] == 0) {
                            echo '<p>Produkt niedostępny</p>';
                        }
                        echo '
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="img">
                        <img src='."$key[2]".' width="126px" height="150px">
                    </div>
                    <div class="clear"></div>
                </div>
                
                <br><br>

                ';
            }

    }

    static public function getIdProduct($name)
    {
        $id = DatabaseManager::selectBySQL("SELECT id FROM produkty WHERE name={$name}");

        if($id==true){
            return $id;
        } else{
            return false;
        }
    }

    static public function updateBasket($column, $value)
    {
        DatabaseManager::updateTable("basket", array($column => $value), array('uid' => $_SESSION['uid']));
            
        
    }

    static public function getPrice($num)
    {
        $i = 0;
        $price = array();

        $select = DatabaseManager::selectBySQL("SELECT pid FROM orders WHERE uid='{$_SESSION['uid']}' AND numorder='$num'");
        if($select == true) {
            foreach($select as $key){

                $select2 = DatabaseManager::selectBySQL("SELECT price FROM produkty WHERE id='$key[0]'");
                foreach($select2 as $key2){}

                
                $price[$i] = $key2[0];
                
                $i++;
                
                
            }
        }
        
        $priceSum = array_sum($price);

        return $priceSum;
    }

    static public function getTable($old,$id)
    {
       
        $select4 = DatabaseManager::selectBySQL("SELECT DISTINCT numorder FROM orders WHERE uid='{$id}' ORDER BY data desc");
        if($select4 == true) {
        foreach($select4 as $key4){
            
            $price = self::getPrice($key4[0]);

            $select2 = DatabaseManager::selectBySQL("SELECT data,status,id,delivery FROM orders WHERE numorder=$key4[0] AND uid='{$id}'");
            if($select2 == true) {
                    foreach($select2 as $key2){}


                    if($key2['3'] == 'paczkomat')
                    {
                        $price+=0;
                    } elseif($key2['3'] == 'ruch')
                    {
                        $price+=5;
                    } elseif($key2['3'] == 'poczta')
                    {
                        $price+=10;
                    } elseif($key2['3'] == 'kurier')
                    {
                        $price+=15;
                    } elseif($key2['3'] == 'pobranie')
                    {
                        $price+=20;
                    }
            
                    $date = substr($key2[0], 0, 10);
                    $time = substr($key2[0], -8);

                    $currentdate = date("d-m-Y");
                    $left  = (strtotime($currentdate) - strtotime($date)) / (60*60*24);
        
                    if($old == 0) {
                        if($left == $old){
                            echo ' <tr><td><form action="vieworder" method="POST"><input type="hidden" name="num" id="num" value="'.$key4[0].'"/><input type="submit" value="'.$key4[0].'"/></form></td> <td>'.$date.'</td> <td>'.$price.' zł. </td> <td>'.$key2[1].' </td></tr>';
                        }
                    } elseif($old == 1) {
                        if($left >= $old && $left <= 7) {
                            echo ' <tr><td><form action="vieworder" method="POST"><input type="hidden" name="num" id="num" value="'.$key4[0].'"/><input type="submit" value="'.$key4[0].'"/></form></td> <td>'.$date.'</td> <td>'.$price.' zł. </td> <td>'.$key2[1].' </td></tr>';
                        }
                    } elseif($old == 7) {
                        if($left >= $old && $left <= 31) {
                            echo ' <tr><td><form action="vieworder" method="POST"><input type="hidden" name="num" id="num" value="'.$key4[0].'"/><input type="submit" value="'.$key4[0].'"/></form></td> <td>'.$date.'</td> <td>'.$price.' zł. </td> <td>'.$key2[1].' </td></tr>';
                        }
                    } elseif($old == 31) {
                        if($left >= $old && $left <= 365) {
                            echo ' <tr><td><form action="vieworder" method="POST"><input type="hidden" name="num" id="num" value="'.$key4[0].'"/><input type="submit" value="'.$key4[0].'"/></form></td> <td>'.$date.'</td> <td>'.$price.' zł. </td> <td>'.$key2[1].' </td></tr>';
                        }
                    } elseif($old == 365) {
                        if($left >= $old && $left <= 10000) {
                            echo ' <tr><td><form action="vieworder" method="POST"><input type="hidden" name="num" id="num" value="'.$key4[0].'"/><input type="submit" value="'.$key4[0].'"/></form></td> <td>'.$date.'</td> <td>'.$price.' zł. </td> <td>'.$key2[1].' </td></tr>';
                        }
                    } elseif($old == 00) {
                            echo ' <tr><td><form action="vieworder" method="POST"><input type="hidden" name="num" id="num" value="'.$key4[0].'"/><input type="submit" value="'.$key4[0].'"/></form></td> <td>'.$date.'</td> <td>'.$price.' zł. </td> <td>'.$key2[1].' </td></tr>';
                    } else {
                        echo "Wystąpił błąd.";
                    }
            } else
            {
                echo '<h3>Wystąpił błąd. Skontaktuj się z działem obsługi klienta.</h3>';
            }
        }
    }


    }

    static public function updateQuantity($num)
    {
        $select = DatabaseManager::selectBySQL('SELECT * FROM orders WHERE uid="'.$_SESSION['uid'].'" AND numorder="'.$num.'"'); 
        if($select == true){
            foreach($select as $arr)
            {
                $data = $arr;

                $selectquantity = DatabaseManager::selectBySQL('SELECT quantity,id FROM produkty WHERE id="'.$data['pid'].'"');
                if($selectquantity == true){
                    foreach($selectquantity as $arr2)
                    {
                        $quantity = $arr2[0] - 1;
                        
                        $update = DatabaseManager::updateTable("produkty", array('quantity' => $quantity), array('id' => $arr2[1]));
                    }
                }
            }
        }
                

    }
    static public function updateStatus($num)
    {
        $select = DatabaseManager::selectBySQL("SELECT id FROM orders WHERE uid='{$_SESSION['uid']}' AND numorder='{$num}'");
        foreach($select as $arr)
        {
            $update = DatabaseManager::updateTable("orders", array('status' => 'potwierdzony'), array('numorder' => $num,
                                                                                                    'id' => $arr[0]));
        }
    }

    static public function updateOrders($what, $delivery)
    {
        $select = DatabaseManager::selectBySQL("SELECT * FROM orders WHERE uid='{$_SESSION['uid']}'");
        if($select == true) {
            foreach($select as $arr) {
                $data = $arr;
                
                if(strlen($data[$what]) == 0) {
                    DatabaseManager::updateTable("orders", array($what => $delivery), array('uid' => $_SESSION['uid'],
                                                                                        'id'  => $data['id']));
                }elseif(($data[$what]) == 'niepotwierdzony') {
                    DatabaseManager::updateTable("orders", array($what => $delivery), array('uid' => $_SESSION['uid'],
                                                                                        'id'  => $data['id']));
                }elseif(($data[$what]) == '0000-00-00 00:00:00') {
                    DatabaseManager::updateTable("orders", array($what => $delivery), array('uid' => $_SESSION['uid'],
                                                                                        'id'  => $data['id']));
                }elseif(($data[$what]) == '15') {
                    DatabaseManager::updateTable("orders", array($what => $delivery), array('uid' => $_SESSION['uid'],
                                                                                        $data[$what] => '15'));

                }

            }       
        }else
        {
            echo "Nie znaleziono<br>";
        }
    }

    static public function updateDate($number, $data)
    {
        $currentDate = $data;
        $key = $number[0].$number[1].$number[2].$number[3].$number[4].$number[5].$number[6].$number[7];
            $update = DatabaseManager::updateTable("orders", array('numorder' => $key), array('data' => $currentDate,
                                                                                     'numorder' => '0'));
                
                
            
    }
    
    static public function getOrderList($status, $adminstatus)
    {
        $yes = 0;
        $status .= $adminstatus;

        switch($status){
            case "wszystkowszystko":
                $select4 = DatabaseManager::selectBySQL("SELECT DISTINCT numorder,uid FROM orders ORDER BY data desc");
            break;

            case "wszystkoniewyslano":
                $select4 = DatabaseManager::selectBySQL("SELECT DISTINCT numorder,uid FROM orders WHERE adminstatus='niewyslano' ORDER BY data desc");
            break;

            case "wszystkowyslano":
                $select4 = DatabaseManager::selectBySQL("SELECT DISTINCT numorder,uid FROM orders WHERE adminstatus='wyslano' ORDER BY data desc");
            break;

            case "niepotwierdzonywszystko":
                $select4 = DatabaseManager::selectBySQL("SELECT DISTINCT numorder,uid FROM orders WHERE status='niepotwierdzony' ORDER BY data desc");
            break;

            case "niepotwierdzonyniewyslano":
                $select4 = DatabaseManager::selectBySQL("SELECT DISTINCT numorder,uid FROM orders WHERE status='niepotwierdzony' AND adminstatus='niewyslano' ORDER BY data desc");
            break;

            case "niepotwierdzonywyslano":
                $select4 = DatabaseManager::selectBySQL("SELECT DISTINCT numorder,uid FROM orders WHERE status='niepotwierdzony' AND adminstatus='wyslano' ORDER BY data desc");
            break;

            case "potwierdzonywszystko":
                $select4 = DatabaseManager::selectBySQL("SELECT DISTINCT numorder,uid FROM orders WHERE status='potwierdzony' ORDER BY data desc");
            break;

            case "potwierdzonyniewyslano":
                $select4 = DatabaseManager::selectBySQL("SELECT DISTINCT numorder,uid FROM orders WHERE status='potwierdzony' AND adminstatus='niewyslano' ORDER BY data desc");
            break;

            case "potwierdzonywyslano":
                $select4 = DatabaseManager::selectBySQL("SELECT DISTINCT numorder,uid FROM orders WHERE status='potwierdzony' AND adminstatus='wyslano' ORDER BY data desc");
            break;
                
            default:
                $yes = 1;
                $select4 = DatabaseManager::selectBySQL("SELECT DISTINCT numorder,uid FROM orders WHERE uid='{$adminstatus}' ORDER BY data desc");

        }
        

        if($select4 == true) {
        foreach($select4 as $key4){
            
            $price = self::getPrice($key4[0]);
            
            $selectname = DatabaseManager::selectBySQL("SELECT username,id FROM users WHERE id='{$key4[1]}'");
            if($selectname == true){
            foreach($selectname as $key5){};

            $select2 = DatabaseManager::selectBySQL("SELECT data,status,id,delivery,payment,adminstatus FROM orders WHERE numorder=$key4[0]");
            if($select2 == true){

                    foreach($select2 as $key2){}


                    if($key2['3'] == 'paczkomat')
                    {
                        $price+=0;
                    } elseif($key2['3'] == 'ruch')
                    {
                        $price+=5;
                    } elseif($key2['3'] == 'poczta')
                    {
                        $price+=10;
                    } elseif($key2['3'] == 'kurier')
                    {
                        $price+=15;
                    } elseif($key2['3'] == 'pobranie')
                    {
                        $price+=20;
                    }
            
                    $date = substr($key2[0], 0, 10);
                    $time = substr($key2[0], -8);
                    
                    if($yes == 0){
                        echo ' <tr><td><form action="vieworder" method="POST"><input type="hidden" name="num" id="num" value="'.$key4[0].'"/><input type="submit" value="'.$key4[0].'"/></form></td><td><form action="viewuser" method="POST"><input type="hidden" name="name" id="name" value="'.$key5[0].'"/><input type="hidden" name="id" id="id" value="'.$key5[1].'"/><input type="submit" value="'.$key5[0].'"/></form></td><td>'.$date.'</td><td>'.$time.'</td><td>'.$price.' zł. </td><td>'.$key2[3].'</td><td>'.$key2[4].'</td> <td>'.$key2[1].' </td><td>'.$key2[5].'</td><td><form action="updateorders" method="POST"><input type="hidden" name="num" id="num" value="'.$key4[0].'"/><input type="submit" value="zmień"/></form></td><td><form action="cancelorder" method="POST"><input type="hidden" name="cancel" id="cancel" value="'.$key4[0].'"/><input type="submit" value="anuluj"/></form></td></tr>
                        ';
                    }elseif($yes == 1){
                        echo ' <tr><td><form action="vieworder" method="POST"><input type="hidden" name="num" id="num" value="'.$key4[0].'"/><input type="submit" value="'.$key4[0].'"/></form></td><td>'.$date.'</td><td>'.$time.'</td><td>'.$price.' zł. </td><td>'.$key2[3].'</td><td>'.$key2[4].'</td> <td>'.$key2[1].' </td><td>'.$key2[5].'</td><td><form action="updateorders" method="POST"><input type="hidden" name="num" id="num" value="'.$key4[0].'"/><input type="submit" value="zmień"/></form></td><td><form action="cancelorder" method="POST"><input type="hidden" name="cancel" id="cancel" value="'.$key4[0].'"/><input type="submit" value="anuluj"/></form></td></tr>
                        ';
                    }

            } else
            {
                echo '<h3>Wystąpił błąd. Skontaktuj się z działem obsługi klienta.</h3>';
            }
        }
        }
    }else{
        echo "Brak zamówień.";
    }
    }

    static public function cancelFromOrder($num)
    {
        $select = DatabaseManager::selectBySQL("SELECT id FROM orders WHERE numorder='{$num}'");
        if($select == true){
            foreach($select as $key){

                $update = DatabaseManager::updateTable("orders", array('status' => 'anulowane', 'adminstatus' => 'anulowane'), array('numorder' => $num));
            }

        }
    }

    static public function selectProducts($id)
    {
        if($id > 0){

        $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE id='{$id}'");
        }elseif($id == '00') {
        $select = DatabaseManager::selectBySQL("SELECT * FROM produkty");
        }
        if($select == true){
            foreach($select as $arr){
                $data = $arr;

                $description = substr($data['description'], 0, 30);
                $description .= '...';
                

                echo '<tr><td><form action="'.$data['subpage'].'" method="POST"><input type="submit" value="'.$data['id'].'."/></form></td><td>'.$data['name'].'</td><td>'.$data['platform'].'</td><td>'.$data['typeof'].'</td><td><form action="choosevalue" method="POST"><input type="hidden" name="pegi" id="pegi" value="'.$data['PEGI'].'"/><input type="hidden" name="id" id="id" value="'.$data['id'].'"/><input type="submit" value="'.$data['PEGI'].'"/></form></td><td><form action="choosevalue" method="POST"><input type="hidden" name="price" id="price" value="'.$data['price'].'"/><input type="hidden" name="id" id="id" value="'.$data['id'].'"/><input type="submit" value="'.$data['price'].' zł"/></form></td><td><form action="choosevalue" method="POST"><input type="hidden" name="quantity" id="quantity" value="'.$data['quantity'].'"/><input type="hidden" name="id" id="id" value="'.$data['id'].'"/><input type="submit" value="'.$data['quantity'].'"/></form></td><td><form action="choosevalue" method="POST"><input type="hidden" name="premiere" id="premiere" value="'.$data['premiere'].'"/><input type="hidden" name="id" id="id" value="'.$data['id'].'"/><input type="submit" value="'.$data['premiere'].'"/></form></td> <td><form action="choosevalue" method="POST"><input type="hidden" name="producer" id="producer" value="'.$data['producer'].'"/><input type="hidden" name="id" id="id" value="'.$data['id'].'"/><input type="submit" value="'.$data['producer'].'"/></form></td><td><form action="choosevalue" method="POST"><input type="hidden" name="description" id="description" value="'.$data['description'].'"/><input type="hidden" name="id" id="id" value="'.$data['id'].'"/><input type="submit" value="'.$description.'"/></form></td></tr>';
            }
        }
    }

    static public function randomizeKey()
    {

        do
        {
            for($i=0; $i <8; $i++)
            {
                $tab[$i] = rand()%8+1;
            }
        $key = $tab[0].$tab[1].$tab[2].$tab[3].$tab[4].$tab[5].$tab[6].$tab[7];
        $select = DatabaseManager::selectBySQL("SELECT * FROM orders WHERE numorder='{$key}'");
        } while($select == true);

        return $key;


    }

    static public function insertToOrders()
    {
        $select = DatabaseManager::selectBySQL("SELECT * FROM basket WHERE uid='{$_SESSION['uid']}'");
        if($select == true)
        {
            foreach($select as $key)
            {
                $data = $key;
                
                $uid = $_SESSION['uid'];
                $pid = $data['pid'];
                $delivery = $data['delivery'];
                $payment = $data['payment'];
                DatabaseManager::insertInto('orders', array('uid'   => $uid,
                                                            'pid'   => addslashes($pid),
                                                            'status' => 'niepotwierdzony',
                                                            'delivery' => addslashes($delivery),
                                                            'payment' => addslashes($payment),
                                                            'adminstatus' => 'niewyslano'));
            }
        }else
        {
            echo "Wystąpił błąd!";
        }
    }

    static public function finalize()
    {
         self::insertToOrders();

        $data = date("Y-m-d H:i:s");
        
        $time = date("H:i:s");

        $pm2 = self::updateOrders("data", $data);

        $uid = $_SESSION['uid'];

        $key = self::randomizeKey();

        $pm3 = self::updateDate($key, $data);

        $del = DatabaseManager::deleteFrom("basket", array('uid'=> $uid));

        $update = self::updateQuantity($key);

        $update = DatabaseManager::updateTable("orders", array('adminstatus' => 'niewyslano'), array('numorder' => $key));

        return $key;
    }

    
    static public function selectFromOrder()
    {
        $priceSum = 0;
        $itemSum = 0;

        $select2 = DatabaseManager::selectBySQL("SELECT pid FROM orders WHERE numorder='{$_POST['num']}'");
        if($select2 == true) {
        foreach($select2 as $arr2) {

            $pid = $arr2[0];


            $select3 = DatabaseManager::selectBySQL("SELECT name,price,subpage FROM produkty WHERE id='{$arr2[0]}'");
            foreach($select3 as $key) {
                echo '
                    <hr>
                    <h4><a href="'.$key[2].'">'.ucfirst($key[0]).'</a> :</h4>
                    <ul>
                        <li>Cena: '.$key[1].' złotych.</li>
                    </ul>

                    <br>
                    ';
                
                $priceSum+=$key[1];

                $itemSum+=1;


            }
        }

        echo '
                <hr>
                <h4>Suma: </h4>
                ---------
                <p>'.$priceSum.' złotych.</p>
                <hr>
                <h4>Przedmioty: </h4>
                ---------
               <p>'.$itemSum.'.</p>
               <br>

                <br>
                <br>
               ';
        

    } else {
        
        echo '

            <h4>Wystąpił nieoczekiwany błąd.</h4>
        
        ';

    }

    }

    static public function sendFinalizeEmail()
    {
        $select  = DatabaseManager::selectBySQL("SELECT email FROM users WHERE id='{$_SESSION['uid']}'");
        foreach($select as $key) {

        }

        echo $key[0];
        $mailTo   = $key[0];
        $mailFrom = "mateusz.lichwiarz@gmail.com";
        $subject  = "Potwierdzenie";
        $uid = $_SESSION['uid'];

        $headers  = "From: " . $mailFrom . "\r\n";
        $headers .= "Reply-To: " . $mailFrom . "\r\n";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n";

        $txt  = "--".$uid."\r\n";
        $txt .= "Content-type:text/html; charset=UTF-8" . "\r\n";
        $txt .= "Witam serdecznie"."\n\n";

        mail($mailTo, $subject, $txt, $headers);
    }

    static public function getName()
    {
        $select2 = DatabaseManager::selectBySQL("SELECT pid FROM orders WHERE uid='{$_SESSION['uid']}' AND status='niepotwierdzony' ");
        foreach($select2 as $key2) {
                
            $pid = $key2[0];

            $select3 = DatabaseManager::selectBySQL("SELECT name FROM produkty WHERE id='{$pid}'");
            foreach($select3 as $key3) {
                
            echo '    
                    <br>
                    <h4>'.ucfirst($key3[0]).'</h4>
                    <br>
                ';
            }
        }
    }

    static public function summaryOrder()
    {
        $priceSum = 0;
        $totalprice = 0;
        $itemSum = 0;

        $select = DatabaseManager::selectBySQL("SELECT * FROM basket WHERE uid='{$_SESSION['uid']}'");
        foreach($select as $arr) {
            $data = $arr;

            

            $pid = $data['pid'];

            $select2 = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE id='{$pid}'");
            foreach($select2 as $arr2) {
                $data2 = $arr2;

                $name = ucfirst($data2['name']);
                
                $priceSum+=$data2['price'];

                $itemSum+=1;

                echo '
                    <h4>'.$name.' :</h4>
                    <ul>
                        <li>Cena: '.$data2['price'].' złotych.</li>
                    </ul>

                    <br>
                    

';

            }
        }

        if($data['delivery'] == 'paczkomat')
        {
            $totalprice+=0;
        } elseif($data['delivery'] == 'ruch')
        {
            $totalprice+=5;
        } elseif($data['delivery'] == 'poczta')
        {
            $totalprice+=10;
        } elseif($data['delivery'] == 'kurier')
        {
            $totalprice+=15;
        } elseif($data['delivery'] == 'pobranie')
        {
            $totalprice+=20;
        }

        $totalprice+=$priceSum;

        echo '
        <hr>
                
                <h4>Przedmiotów w koszyku: </h4>
                ---------
                <p>'.$itemSum.'.</p>
                <hr>
                <h4>Suma: </h4>
                ---------
                <p>'.$priceSum.' złotych + koszt wysyłki ='.$totalprice.'złotych.</p>
                <hr>
                <h4>Płatność: </h4>
                ---------
                <p>'.strtoupper($data['payment']).' </p>
                <br>
            ';

            echo<<<_END

        <form action="orderfinalize" method="POST" class="order_form">
        <input type="submit" value="Zamów">
        </form>

_END;
        
    }

    static public function insert($pid, $table)
    {
        $res = DatabaseManager::insertInto($table, array("uid" => $_SESSION['uid'],
                                                         "pid" => $pid));
        
        if($res) {
            return $res;
        } else {
            return false;
        }
    }

    static public function update($value,$column,$id,$table)
    {
        $res = DatabaseManager::updateTable($table, array($column => $value), array('id' => $id));

        if($res){
            return $res;
        } else{
            return false;
        }
    }

    static public function selectFromBasket()
    {
        $priceSum = 0;
        $itemSum = 0;

        $select2 = DatabaseManager::selectBySQL("SELECT * FROM basket WHERE uid='{$_SESSION['uid']}'");

        if($select2) {
        foreach($select2 as $arr2) {
            $data2 = $arr2;
            
            $pid = $data2['pid'];


            $select3 = DatabaseManager::selectBySQL("SELECT name,price,subpage FROM produkty WHERE id='{$data2['pid']}'");
            foreach($select3 as $key) {
                echo '
                    <hr>
                    <h4><a href="'.$key[2].'">'.ucfirst($key[0]).'</a> :</h4>
                    <ul>
                        <li>Cena: '.$key[1].' złotych.</li>
                    </ul>

                    <br>
                    ';

                echo<<<_END
                    <form action="removefrombasket" method="POST" class="remove_form">
                        <input type="hidden" name="pid" value="$pid">
                        <input type="submit" value="Usuń">
                    </form>

                    <hr>
_END;
                
                $priceSum+=$key[1];

                $itemSum+=1;


            }
        }

        echo '
                <hr>
                <h4>Suma: </h4>
                ---------
                <p>'.$priceSum.' złotych.</p>
                <hr>
                <h4>Przedmiotów w koszyku: </h4>
                ---------
               <p>'.$itemSum.'.</p>
               <br>

               <form action="removefrombasket" method="POST" class="remove_form">
                    <input type="hidden" name="pid" value="remove">
                    <input type="submit" value="Usuń wszystko">
                </form>
                <br>
                <br>
               ';

        echo<<<_END
        <form action="orderdelivery" method="POST" class="order_form">
            <input type="hidden" name="pid" value="$pid">
            <input type="submit" value="Wybierz sposób dostawy">
        </form>
        <br><br><br>


_END;
        

    } else {
        
        echo '

            <h4>Twój koszyk jest pusty.</h4>
        
        ';

    }

    }

    static public function removeFromBasket($pid)
    {
        if($pid == 'remove')
        {
            $uid = $_SESSION['uid'];
            $del = DatabaseManager::deleteFrom("basket", array('uid'=> $uid));

        }else{
            $del = DatabaseManager::deleteFrom("basket", array('pid'=> $pid));
        }
        

        if($del)
        {
            header("Location: ".SERVER_ADDRESS."basket");
        }
    }

    function SaveImg($POST)
    {
        if(isset($POST) && is_array($POST))
        {
            $name = addslashes($POST['name']);
            $strName = str_replace(' ','',$name);
            $subpage = $strName.addslashes($POST['platform']);

            $location = './img/'.$subpage.'.png';

            if(is_uploaded_file($_FILES['img']['tmp_name']))
            {
                if(!move_uploaded_file($_FILES['img']['tmp_name'], $location))
                {
                    echo 'Nie udało się skopiować pliku do katalogu';
                    return false;
                }
            }
            else
            {
                echo 'Plik nie został zapisany';
                return false;
            }
            return true;
        }
    }

    static public function AddProduct($POST)
    {
    if(isset($POST) && is_array($POST))
    {


        $name = addslashes($POST['name']);

        $strName = str_replace(' ','',$name);

        $subpage = $strName.addslashes($POST['platform']);

            $res = DatabaseManager::insertInto("produkty", array("name"        => addslashes($POST['name']),
                                                                 "platform"    => addslashes($POST['platform']),
                                                                 "typeof"      => addslashes($POST['typeof']),
                                                                 "PEGI"        => addslashes($POST['PEGI']),
                                                                 "price"       => addslashes($POST['price']),
                                                                 "subpage"     => $subpage,
                                                                 "quantity"    => addslashes($POST['quantity']),
                                                                 "srcimg"      => "img/".$subpage.".png",
                                                                 "premiere"    => addslashes($POST['premiere']),
                                                                 "description" => addslashes($POST['description']),
                                                                 "producer"    => addslashes($POST['producer'])));
            
        if($res)
        {

        $newfile = fopen("LIBRARY/$subpage.library.php", 'w+');
        $text = <<<_END
            <?php

                ModuleLoader::load('open');
                ModuleLoader::load('logo');
                ModuleLoader::load('nav');
                ModuleLoader::load('$subpage');
                ModuleLoader::load('footer');
                ModuleLoader::load('js');
                ModuleLoader::load('close');
_END;

        fwrite($newfile, $text);
        fclose($newfile);
                    
        echo "plik '$subpage.library.php' został zapisany pomyślnie";


        $module = fopen("CLASS/ModuleLoader.class.php" , 'r+');

        $uppercase = strtoupper($_POST['name']);

        $text2 = <<<_END

        case '$subpage':

_END;
                
            $text2 .= '
                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='; $text2 .= "'{$_POST['name']}' AND platform='{$_POST['platform']}' AND typeof='{$_POST['typeof']}' LIMIT 1"; $text2 .='");';
            $text2 .= '
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            ';


            $text2 .= '
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
';
            $text2 .= " echo '";
            $text2 .= " <img src="; $text2.='"';$text2.="'"; $text2 .='.$data['; $text2 .="'srcimg'"; $text2 .="]; 
                        echo <<<END
                        "; $text2 .= '" width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                    '; $text2 .= ' echo "
                    <h3>"'; $text2 .= '.ucfirst($data['; $text2 .= "'name'"; $text2 .= "]);"; $text2 .= '
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
';
            $text2 .= ' 
                        echo "
                            <br>
                            <p>Platforma:  "'; $text2 .= '.strtoupper($data['; $text2 .= "'platform'"; $text2 .="]);"; $text2 .= 'echo "'; $text2 .= '</p>
                            <p>Rodzaj gry: "'; $text2 .= '.strtoupper($data['; $text2 .= "'typeof'"; $text2 .="]);"; $text2 .= 'echo "'; $text2 .='</p>
                            <p>PEGI(wiek): "'; $text2 .= '.$data['; $text2 .= "'PEGI'"; $text2 .="];"; $text2 .= 'echo "'; $text2 .='</p>
                            <p>Producent: "'; $text2 .= '.$data['; $text2 .= "'producer'"; $text2 .="];"; $text2 .= 'echo "'; $text2 .='</p>
                            <p>Premiera:   "'; $text2 .= '.$data['; $text2 .= "'premiere'"; $text2 .="];"; $text2 .= 'echo "'; $text2 .='</p>
                            <p>Dostępność: "'; $text2 .= '.$data['; $text2 .= "'quantity'"; $text2 .="];"; $text2 .= 'echo "'; $text2 .=' szt.</p>
            ";   
            ';
            $text2 .= " echo '
                         </div>
            ";
                
                
                
            $text2 .= ' 
                        <div class="buy_page">
                            <div class="price_page">
                            '; $text2 .= "';"; $text2 .= ' echo "
                                <p>Cena: "'; $text2 .= '.$data['; $text2 .="'price'"; $text2 .="];"; $text2 .= "
                                echo <<<END
                                "; $text2 .= "zł</p>
                            </div>
                            <div class="; $text2 .= '"basket_page"'; $text2 .= '>
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        ';  $text2 .= "echo '";
                            $text2 .= '
                                    <input type="hidden" name="subpage" value="'; $text2.="'"; $text2.=' .$data['; $text2 .= "'subpage'];"; $text2 .="echo '"; $text2 .= '">';
                                    $text2 .= "';";
                                    $text2 .= "if"; $text2 .= '($data'; $text2 .= "['quantity']"; $text2 .= ' > 0){';
                                    $text2 .= "echo '"; $text2 .='<input type="submit" value="Dodaj do koszyka">'; $text2 .= "'"; $text2 .= ';';
                                    $text2 .= "}else{";
                                    $text2 .= "echo "; $text2 .='"produkt niedostępny";';
                                    $text2 .= "}";
                                    $text2 .= "echo '";
                                    $text2 .= '
                                </form>
                            </div>
                        </div>
                
                        <div class="clear"></div>
                
                    </div>
                
                    <div class="clear"></div>
                
                    <br><br><br>
        
                    <div class="description_page">
            
                        <h1>Opis: </h1>
            
                        <br><br>
';$text2 .= "';";
                $text2 .= ' echo "
                        <h2>"'; $text2 .= '.ucfirst($data['; $text2 .="'name'"; $text2 .="]);"; $text2 .= '
                        echo <<<END
                        '; $text2 .= '</h2>
                            <br>
END;
                '; $text2 .= ' echo "            
                        <p>"'; $text2 .= '.$data['; $text2 .="'description'"; $text2 .="];"; $text2 .= '
                        echo <<<END
                        '; $text2 .= '</p>
                    </div>
                </div>
END;


                break;
                
                
                default;
                break;
                            }
                        }
                    }
';

                fseek($module, -131, SEEK_END);
                fwrite($module, "$text2");
                fclose($module);

        
                $mainpage = fopen("CLASS/Managers/MainPage.class.php", "r+");

                $text3 = "
case '$subpage':
require_once ".'$this->active_page'.'.".library.php";
break;
            }
        }
    }

';

            fseek($mainpage, -32, SEEK_END);
            fwrite($mainpage, "$text3");
            fclose($mainpage);

        } else {
            return false;
        }
    } else {
        return false;
    }

}


}