<?php

class ModuleLoader
{
    static public function load($MODULE)
    {
        switch ($MODULE) {
            case 'open':

            echo <<<END
            <!Doctype>
            <html>
            <head>
	            <meta charset="utf-8"/>
	            <title>Sklep</title>
	            <meta hhtp-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	            <link href="style/styl.css" rel="stylesheet" type="text/css" />
	            <link href='http://fonts.googleapis.com/css?family=Lato:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	            <link href="css/fontello.css" rel="stylesheet" type="text/css" />
            </head>
            <body>
                <div id="container">
END;
break;

            case 'footer':

            echo<<<END
            <div class="footer">BestGames.com</div>

END;
break;

            case 'js':

            echo<<<END

            <script src="js/jquery-1.11.3.min.js"></script>

            <script>

	        $(document).ready(function() {
                var NavY = $('.nav').offset().top;

                var stickyNav = function(){
                var ScrollY = $(window).scrollTop();

                if (ScrollY > NavY) {
                    $('.nav').addClass('sticky');
                } else {
                    $('.nav').removeClass('sticky');
                }
                };

                stickyNav();

                $(window).scroll(function() {
                    stickyNav();
                });
                });

            </script>

END;
break;

            case 'close':
            echo <<<END
            </div>
            </body>
            </html>

END;
break;



            case 'register':
            if(!isset($_SESSION['logged']) && !isset($_SESSION['uid'])) {
            echo <<<END

                    <div class="form">

                        <h5>Zarejstruj się!</h5>

			            <form action="register/" method="POST" class="register_form">

				            <label for="username">Wybierz nazwę użytkownika:</label>	<br>
				            <input type="text" id="username" name="username">

					            <br>

				            <label for="password">Podaj hasło:</label>	<br>
				            <input type="password" id="password" name="password">

                                <br>

                            <label for="email">Podaj adres e-mail:</label> <br>
                            <input type="text" id="email" name="email">

                                <br><br>

			        	    <input type="submit" value="Stwórz konto" name="register" id="register">


                        </form>

                    </div>




END;
            };
break;

                case 'login':

                echo <<<END

                        <div class="form">

                            <h2>Zaloguj się<h2>

                            <form action="login/" method="POST" class="login_form"

                                <label for="username">Nazwa użytkownika:</label> <br>
                                <input type="text" id="username" name="username">

                                    <br>

                                <label for="password">Hasło: </label> <br>
                                <input type="password" id="password" name="password">

                                    <br>

                                <input type="submit" value="Zaloguj" name="login" id="login">

                                    <br>

                            </form>

                        </div>

END;
break;

            case 'logged':

            echo<<<END
                    <div class="content">
                        <h2>Dziękujemy za zaufanie i życzymy udanych zakupów!</h2>
                        
                        <div class="attention">

                            <h3>Uwaga! Sklep został stworzony w celach edukacyjnych oraz demonstracyjnych,<br>
                            osoba odpowiedzialna za stronę nie prowadzi działalności gospodarczej <br>
                            oraz nie czerpie żadych zysków z jakiejkolwiek sprzedaży, ponieważ takowej nie ma,<br>
                            asortyment jest wirtualny-nie istniejący w rzeczywistości! <br> </h3>

                        </div>

                        <h3>Wybierz interesującą Cię sekcję znajdującą się na pasku wyboru.</h3>

                        <h4>Prosimy również o uzupełnienie danych osobowych do wysyłki.</h4>
                        <br>
                    </div>
END;
break;

            case 'logo':

            echo <<<END
                    <div class="header">

			            <div class="logo">
				            <img src="images/pad.png" style="float: left;"/>
				            <span style="color: #c34f4f">Best</span>Games.com
				            <div style="clear:both;"></div>
			            </div>
		            </div>

END;
break;

            case 'nav':
            if(isset($_SESSION['uid']) && isset($_SESSION['logged'])){

                $select = DatabaseManager::selectBySQL("SELECT admin FROM users WHERE id='{$_SESSION['uid']}'");
                foreach($select as $key){};
                echo '
                <div class="nav">
                <ol>
                    <li><a href="home"><div class="home"><i class="icon-home"></i></div></a></li>
                    <li>PC
                        <ul>
                            <li><a href="rpgpc">RPG</a></li>
                            <li><a href="fpspc">FPS</a></li>
                            <li><a href="tpppc">TPP</a></li>
                            <li><a href="strategypc">Strategie</a></li>
                            <li><a href="simpc">Symulacje</a></li>
                            <li><a href="sportpc">Sportowe</a></li>
                            <li><a href="hspc">Hack&Slash</a></li>
                        </ul>
                    </li>
                    <li>PlayStation
                        <ul>
                            <li><a href="rpgps">RPG</a></li>
                            <li><a href="fpsps">FPS</a></li>
                            <li><a href="tppps">TPP</a></li>
                            <li><a href="simps">Symulacje</a></li>
                            <li><a href="sportps">Sportowe</a></li>
                            <li><a href="hsps">Hack&Slash</a></li>
                        </ul>
                    </li>
                    <li>XboX
                        <ul>
                            <li><a href="rpgx">RPG</a></li>
                            <li><a href="fpsx">FPS</a></li>
                            <li><a href="tppx">TPP</a></li>
                            <li><a href="simx">Symulacje</a></li>
                            <li><a href="sportx">Sportowe</a></li>
                            <li><a href="hsx">Hack&Slash</a></li>
                        </ul>
                    </li>
                    <li>Nintendo
                        <ul>
                            <li><a href="rpgn">RPG</a></li>
                            <li><a href="fpsn">FPS</a></li>
                            <li><a href="tppn">TPP</a></li>
                            <li><a href="simn">Symulacje</a></li>
                            <li><a href="sportn">Sportowe</a></li>
                            <li><a href="hsn">Hack&Slash</a></li>
                        </ul>
                    </li>
                    <li><a href="account">Konto</a>
                        <ul>
                            <li><a href="orders">Zamówienia</a></li>
                            <li><a href="messenger">Wiadomości</a></li>
                            '; 
                            if($key[0] == 1)
                            {
                                echo '<li><a href="adminpanel">Panel admina</a></li>';
                            }
                            echo '
                            <li><a href="logout">Wyloguj</a></li>
                        </ul>
                    </li>
                    <li><a href="basket"><div class="basket"><i class="icon-shopping-basket"></i></div></a></li>

                </ol>

            </div>
            ';

            } else{
                echo '
                
                <div class="nav">
                <ol>
                    <li><a href="home"><div class="home"><i class="icon-home"></i></div></a></li>
                    <li>PC
                        <ul>
                            <li><a href="rpgpc">RPG</a></li>
                            <li><a href="fpspc">FPS</a></li>
                            <li><a href="tpppc">TPP</a></li>
                            <li><a href="strategypc">Strategie</a></li>
                            <li><a href="simpc">Symulacje</a></li>
                            <li><a href="sportpc">Sportowe</a></li>
                            <li><a href="hspc">Hack&Slash</a></li>
                        </ul>
                    </li>
                    <li>PlayStation
                        <ul>
                            <li><a href="rpgps">RPG</a></li>
                            <li><a href="fpsps">FPS</a></li>
                            <li><a href="tppps">TPP</a></li>
                            <li><a href="simps">Symulacje</a></li>
                            <li><a href="sportps">Sportowe</a></li>
                            <li><a href="hsps">Hack&Slash</a></li>
                        </ul>
                    </li>
                    <li>XboX
                        <ul>
                            <li><a href="rpgx">RPG</a></li>
                            <li><a href="fpsx">FPS</a></li>
                            <li><a href="tppx">TPP</a></li>
                            <li><a href="simx">Symulacje</a></li>
                            <li><a href="sportx">Sportowe</a></li>
                            <li><a href="hsx">Hack&Slash</a></li>
                        </ul>
                    </li>
                    <li>Nintendo
                        <ul>
                            <li><a href="rpgn">RPG</a></li>
                            <li><a href="fpsn">FPS</a></li>
                            <li><a href="tppn">TPP</a></li>
                            <li><a href="simn">Symulacje</a></li>
                            <li><a href="sportn">Sportowe</a></li>
                            <li><a href="hsn">Hack&Slash</a></li>
                        </ul>
                    </li>
                    <li><a href="account">Konto</a>
                        <ul>
                            <li><a href="orders">Zamówienia</a></li>
                            <li><a href="messenger">Wiadomości</a></li>
                            <li><a href="accountlogin">Zaloguj</a></li>
                        </ul>
                    </li>
                    <li><a href="basket"><div class="basket"><i class="icon-shopping-basket"></i></div></a></li>

                </ol>

            </div>
                
                
                ';
            }

break;

            case 'delivery':

            echo<<<_END

            <div class="content">
                <h2>Wybierz sposób dostawy.</h2>

                <form action="orderpayment" method="POST" class="order_form">

                    <label for="delivery">Sposób dostawy: </label><br><br>
                        <input checked type="radio" id="delivery" name="delivery" value="paczkomat">Paczkomat(gratis do każdej paczki), <br>
                        <input type="radio" id="delivery" name="delivery" value="ruch">Kiosk Ruchu(5zł), <br>
                        <input type="radio" id="delivery" name="delivery" value="poczta">Poczta Polska(10zł), <br>
                        <input type="radio" id="delivery" name="delivery" value="kurier">Kurier(15zł), <br>
                        <input type="radio" id="delivery" name="delivery" value="pobranie">Kurier za pobraniem(20zł), <br>
                    
                    

                        <br>

                    <input type="submit" value="dalej" name="orderpayment" id="orderpayment">

                </form>

_END;
break;

            case 'payment':

            echo<<<_END
            <div class="content">
                <h2>Wybierz metode płatności.</h2>

                <form action="ordersummary" method="POST" class="order_form">

                    <label for="payment">Metoda: </label><br><br>
                        <input checked type="radio" id="payment" name="payment" value="tradycyjny">Przelew tradycyjny, <br>
                        <input type="radio" id="payment" name="payment" value="payu">PayU, <br>
                        <input type="radio" id="payment" name="payment" value="card">Karta płatnicza, <br>
                        <input type="radio" id="payment" name="payment" value="gift">Karta podarunkowa, <br>

                        <br>

                    <input type="submit" value="Podsumowanie" name="ordersummary" id="ordersummary">

                </form>
            
            </div>


_END;
break;

            case 'summary':

            echo'

            <div class="content">
                <h2>Podsumowanie zamównienia.</h2>

                <h3>Twoje zamównienie: </h3>
                ';

                ProductManager::summaryOrder(); 
                
                echo '
                

            </div>

            ';
break;
            
            case 'finalize':
            $key = ProductManager::finalize();
            echo '

                <div class="content">
                    <h2>Twoje zamówienie zostało pomyślnie przekazane!</h2>
                    <h2>Twój numer zamówienia: '.$key.'</h2>
                    <h3>Na Twój E-mail została wysłana wiadomość z prośbą potwierdzenia zamówienia.</h3>

                    <div class="form">
                    
                        <form action="confirmation" method="POST" class="confirmation_form">

                        <label for="status">W razie gdyby email nie przyszedł, kliknij aby potwierdzić zakup. </label><br><br>
                            <input type="hidden" name="status" value="potwierdzony">
                            <input type="hidden" name="num" value="'.$key.'">
                        <input type="submit" value="Potwierdź" name="confirmation" id="confirmation">

                </form>
                    </div>
            
            
            ';
            break;

            case 'confirmation':

            echo '

                <div class="content">
                    <h2>Twoje zamówienie zostało pomyślnie zatwierdzone!</h2>
                    <h3>Status zamówienia możesz zobaczyć w sekcji konto-zamówienia.</h3>
            
            ';
            break;

            case 'home':

            echo<<<END
                    <div class="content">
                        <h2>Witaj w wirtualnym sklepie internetowym BestGames!</h2>

                        <div class="attention">

                            <h3>Uwaga! Sklep został stworzony w celach edukacyjnych oraz demonstracyjnych,<br>
                            osoba odpowiedzialna za stronę nie prowadzi działalności gospodarczej <br>
                            oraz nie czerpie żadych zysków z jakiejkolwiek sprzedaży, ponieważ takowej nie ma,<br>
                            asortyment jest wirtualny nie istniejący w rzeczywistości! <br> </h3>

                        </div>
                        <h4>Wybierz interesującą Cię sekcję znajdującą się na pasku wyboru.</h4>

                        <h5>Aby zalogować się najedź kursorem myszy na sekcję konto na pasku nawigacji</h5>
                        <h5>I wszystko bedzie jasne.

                        <h5>Jeśli wciąż nie posiadasz konta zarejestruj się za darmo już dziś!</h5>

                    </div>

END;
break;

            case 'notlogged':
            
            echo <<<END
                <div class="content">

                    <h2>Aby skorzystać z tej sekcji musisz posiadać konto oraz być zalogowanym w tym serwisie.</h2>
                    
                </div>

END;
break;

            case 'basket':


                if(!isset($_SESSION['logged']) && !isset($_SESSION['uid'])) {

                        echo '<div class="content">

                                <h2>Aby skorzystać z tej sekcji musisz posiadać konto oraz być zalogowanym w tym serwisie.</h2>
                            ';

                } elseif(isset($_POST['subpage'])) {


                    $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE subpage='{$_POST['subpage']}'");
                    foreach($select as $arr) {
                        $data = $arr;
                    }
                    if($data['quantity'] > 0){
                    ProductManager::insert($data['id'], "basket");

                    echo '
                    <div class="content">
                        <div id="basket">
                            <h2>Twój koszyk:</h2>

                    ';
                    ProductManager::selectFromBasket();

                    echo '

                        </div>
                    </div>

                    ';

                } elseif($data['quantity'] == 0){
                    echo '<h2>Przecież ten produkt jest niedostępny, więc albo próbujesz mnie oszukać albo wystąpił jakiś niewyjaśnialny błąd. Dla Twojego dobra oby to drugie było prawdziwe...</h2>';
                }
                } else {
                    echo '<div class="content">
                            <div id="basket">
                <h2>Twój koszyk:</h2>

                <table>

                ';
                ProductManager::selectFromBasket();
                echo '

                </table>
                
                    </div>
                </div>

            ';



            };

            break;

            case 'update':


            $data  = $_POST['data'];
            $token = $_POST['token'];
                echo '
                    <div class="content">
                    
                    <h3>Obecna wartość pola: '.$data.'</h3>
                    <form action="updateusers" method="POST">

                        <label for="value">Wpisz żądaną wartość:</label> <br>
                        <input type="text" name="value" id="value"/>

                        <input type="hidden" name="data" id="data" value="'.$data.'"/>
                        <input type="hidden" name="token" id="token" value="'.$token.'"/>
                        
                        <input type="submit" value="Zmień"/>
                    </form

                    </div>
            
                ';

            break;

            case 'account':

            if(isset($_SESSION['logged']) && isset($_SESSION['uid'])) {

            $select = DatabaseManager::selectBySQL("SELECT * FROM users WHERE id={$_SESSION['uid']}");
            foreach($select as $arr) {
                $data = $arr;
            }

            $select2 = DatabaseManager::selectBySQL("SELECT * FROM personals WHERE id={$_SESSION['uid']}");
            if($select2 == true) {
                foreach($select2 as $arr2) {
                    $data2 = $arr2;

                }



            echo '
                    <div class="content">

                        <h3>Twoje dane</h3>

                        <ul class="datauser">
                            <li>Nazwa użytkownika:  <span>'.$data['username'].'</span></li> <form action="update" method="POST"><input type="hidden" id="token" name="token" value="username"/><input type="hidden" id="data" name="data" value="'.$data['username'].'"/><input type="submit" value="zmień"/></form>
                            <li>Adres E-Mail:       <span>'.$data['email'].'</span></li>    <form action="update" method="POST"><input type="hidden" id="token" name="token" value="email"/><input type="hidden" id="data" name="data" value="'.$data['email'].'"/><input type="submit" value="zmień"/></form>
                            <li>Imię:               <span>'.$data2['forename'].'</span></li><form action="update" method="POST"><input type="hidden" id="token" name="token" value="forename"/><input type="hidden" id="data" name="data" value="'.$data2['forename'].'"/><input type="submit" value="zmień"/></form>
                            <li>Nazwisko:           <span>'.$data2['surname'].'</span></li> <form action="update" method="POST"><input type="hidden" id="token" name="token" value="surname"/><input type="hidden" id="data" name="data" value="'.$data2['surname'].'"/><input type="submit" value="zmień"/></form>
                            <li>Kod Pocztowy:       <span>'.$data2['zipcode'].'</span></li> <form action="update" method="POST"><input type="hidden" id="token" name="token" value="zipcode"/><input type="hidden" id="data" name="data" value="'.$data2['zipcode'].'"/><input type="submit" value="zmień"/></form>
                            <li>Miasto:             <span>'.$data2['city'].'</span></li>    <form action="update" method="POST"><input type="hidden" id="token" name="token" value="city"/><input type="hidden" id="data" name="data" value="'.$data2['city'].'"/><input type="submit" value="zmień"/></form>
                            <li>Ulica:              <span>'.$data2['street'].'</span></li>  <form action="update" method="POST"><input type="hidden" id="token" name="token" value="street"/><input type="hidden" id="data" name="data" value="'.$data2['street'].'"/><input type="submit" value="zmień"/></form>
                            <li>Telefon kontaktowy: <span>'.$data2['phone'].'</span></li>   <form action="update" method="POST"><input type="hidden" id="token" name="token" value="phone"/><input type="hidden" id="data" name="data" value="'.$data2['phone'].'"/><input type="submit" value="zmień"/></form>
                            ';
                            if($data['admin']==true)
                            {
                                echo '<li>Admin: tak </li>';
                            }
                            echo'
                        </ul>
                    
                    </div>
                ';



                } else {
                    echo'
                    <div class="content">

                        <h3>Twoje dane</h3>

                        <ul class="datauser">
                            <li>Nazwa użytkownika:      <span>'.$data['username'].'</span></li>
                            <li>Adres E-Mail:           <span>'.$data['email'].'</span></li>
                        </ul>

                    </div>
                    ';
                };
                
                if($select2 == false){
                    echo '
                    <div class="form">

                            <h3>Uzupełnij swoje dane osobowe: </h3>

                            <form action="insert" method="POST" class="update_form">

                                <label for="forename">Twoje imię: </label> <br>
                                <input type="text" id="forename" name="forename">

                                    <br>

                                <label for="surname">Twoje Nazwisko: </label> <br>
                                <input type="text" id="surname" name="surname">

                                    <br>

                                <label for="zipcode">Kod Pocztowy(xx-xxx): </label> <br>
                                <input type="text" id="zipcode" name="zipcode">

                                    <br>

                                <label for="city">Miasto: </label> <br>
                                <input type="text" id="city" name="city">

                                    <br>

                                <label for="street">Ulica: </label> <br>
                                <input type="text" id="street" name="street">

                                    <br>

                                <label for="phone">Telefon kontaktowy: </label> <br>
                                <input type="text" id="phone" name="phone">

                                    <br><br>

                                <input type="submit" value="Uzupełnij" name="update" id="update">

                            </form>

                        </div>




            ';
            }else {
                echo '';
            }

        } else {

            echo'
                    <div class="content">

                        <h3>Aby skorzystać z tej sekcji musisz posiadać konto w tym serwisie!</h3>

                    </div>
            ';
        }

break;
            case 'updateorders':
                echo '
                    <div class="content">
                        <h2>Status admina został zmieniony</h2>
                    </div>
                ';

            break;

            case 'cancelorder':

                echo '
                    <div class="content">
                        <h2>Zamówienie zostało anulowane</h2>
                    </div>
                ';

            break;

            case 'writemessage':

            $reader = $_POST['id'];
            $select = DatabaseManager::selectBySQL("SELECT username FROM users WHERE id='{$reader}'");
            foreach($select as $key){}

                echo '
                    <div class="content">
                        <h2>Napisz wiadmość do użytkownika: '.$key[0].'</h2>
                        <form action="sendmessage" method="POST">

                        <input type="hidden" name="reader" id="reader"  value="'.$reader.'"/>

                        <textarea id="message" name="message" rows= "14" cols="70"></textarea>

                        <br><br>

                        <input type="submit" value="Wyślij"/>

                        </form>
                    </div>                
                
                ';
            break;

            case 'sendmessage':

                echo '
                    <div class="content">
                        <h2>Wiadomość została pomyślnie wysłana.</h2>
                    </div>
                ';

            break;

            case 'messenger':
                
                if(isset($_SESSION['admin'])){
                
                    if(isset($_POST['id']) || isset($_SESSION['reader'])){

                        if(isset($_SESSION['reader'])){
                            $writer = $_SESSION['reader'];
                        }else{
                            $writer = $_POST['id'];
                        }
    
                        $i = 0;
                        $reader = $_SESSION['uid'];
    
                        unset($_SESSION['reader']);
        
                        echo '
                            <div class="content">
                                <h2>Wiadomości</h2>
                                <hr>
        
                                <div class="leftpanel">
                                    <h3>Użytkownicy</h3>
                                    '; 
                                    $select = DatabaseManager::SelectBySQL("SELECT username,id FROM users");
                                    foreach($select as $keyu)
                                    {
                                        if($keyu[1] != $_SESSION['uid']){
                                            echo '<div class="admin">
            
                                                    <form action="messenger" method="POST">
                                                        <input type="hidden" name="id" id="id" value="'.$keyu[1].'"/>
                                                        <input type="submit" value="'.$keyu[0].'" />
                                                    </form>
                                                </div>
                                            ';
                                            }
                                        }
                                        
                                    
                                    
                                echo '
                                </div>
                                
                                <div class="rightpanel">
                                    
                                    <div class="messages">
                                '; 
                                $mm = new MessagesManager("",$writer,$reader);
                                $read = $mm->ReadMessage();
        
                                if($read == true){
                                    foreach($read as $key)
                                    {
                                        $select2 = DatabaseManager::selectBySQL("SELECT writeruid FROM messages WHERE message='{$key}'");
                                        foreach($select2 as $key2){
                                            $selectuser = DatabaseManager::selectBySQL("SELECT username FROM users WHERE id='{$key2[0]}'");
                                            foreach($selectuser as $user){}
                                        }
                                        echo '<br>'.$user[0].': '.$key;
                                    }
                                }
                                echo '
        
                                    </div>
                                
                                    <div class="send">
                                        <form action="sendmessage" method="POST">
        
                                            <input type="hidden" name="reader" id="reader"  value="'.$writer.'"/>
                                            <input type="hidden" name="token" id="token" value="yes"/>
                                            
                                            <br>
                                            <textarea id="message" name="message" rows= "3" cols="90"></textarea>
            
                                            <br><br>
            
                                            <input type="submit" value="Wyślij"/>
                                        </form>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        ';

                    
                    }else{
                    $reader = $_SESSION['uid'];
    
                    echo '
                        <div class="content">
                            <h2>Wiadomości</h2>
                            <hr>
    
                            <div class="leftpanel">
                                <h3>Użytkownicy</h3>
                                '; 
                                $select = DatabaseManager::SelectBySQL("SELECT username,id FROM users");
                                    foreach($select as $keyu)
                                    {
                                        if($keyu[1] != $_SESSION['uid']){
                                            echo '<div class="admin">
            
                                                    <form action="messenger" method="POST">
                                                        <input type="hidden" name="id" id="id" value="'.$keyu[1].'"/>
                                                        <input type="submit" value="'.$keyu[0].'" />
                                                    </form>
                                                </div>
                                            ';
                                        }
                                    }
                                
                            echo '
                            </div>
                            
                            <div class="rightpanel">
                                
                                <div class="messages">
    
                                </div>
                            
                                <div class="send">
                                    <form action="messenger" method="POST">
                                    
                                        <br>
                                        <textarea id="message" name="message" rows= "3" cols="90"></textarea>
        
                                        <br><br>
        
                                        <input type="submit" value="Wyślij"/>
                                    </form>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    ';
                        }
                
                
                
                
                }else{

                if(isset($_POST['id']) || isset($_SESSION['reader'])){

                    if(isset($_SESSION['reader'])){
                        $writer = $_SESSION['reader'];
                    }else{
                        $writer = $_POST['id'];
                    }

                    $i = 0;
                    $reader = $_SESSION['uid'];

                    unset($_SESSION['reader']);
    
                    echo '
                        <div class="content">
                            <h2>Wiadomości</h2>
                            <hr>
    
                            <div class="leftpanel">
                                <h3>Administratorzy</h3>
                                '; 
                                $selectadmins = DatabaseManager::SelectBySQL("SELECT id FROM users WHERE admin='1'");
                                foreach($selectadmins as $keya)
                                {
                                        
                                        $selectname = DatabaseManager::SelectBySQL("SELECT forename, surname FROM personals WHERE id='$keya[0]'");
                                        foreach($selectname as $key2)
                                        {
                                            $forename = ucwords($key2[0]);
                                            $surname  = ucwords($key2[1]);
            
                                            echo '<div class="admin">
            
                                                    <form action="messenger" method="POST">
                                                        <input type="hidden" name="id" id="id" value="'.$keya[0].'"/>
                                                        <input type="submit" value="'.$forename.' '.$surname.'" />
                                                    </form>
                                                </div>
                                            ';
                                        }
                                    
                                }
                                
                            echo '
                            </div>
                            
                            <div class="rightpanel">
                                
                                <div class="messages">
                            '; 
                            $mm = new MessagesManager("",$writer,$reader);
                            $read = $mm->ReadMessage();
    
                            if($read == true){
                                foreach($read as $key)
                                {
                                    $select2 = DatabaseManager::selectBySQL("SELECT writeruid FROM messages WHERE message='{$key}'");
                                    foreach($select2 as $key2){
                                        $selectuser = DatabaseManager::selectBySQL("SELECT username FROM users WHERE id='{$key2[0]}'");
                                        foreach($selectuser as $user){}
                                    }
                                    echo '<br>'.$user[0].': '.$key;
                                }
                            }
                            echo '
    
                                </div>
                            
                                <div class="send">
                                    <form action="sendmessage" method="POST">
    
                                        <input type="hidden" name="reader" id="reader"  value="'.$writer.'"/>
                                        <input type="hidden" name="token" id="token" value="yes"/>
                                        
                                        <br>
                                        <textarea id="message" name="message" rows= "3" cols="90"></textarea>
        
                                        <br><br>
        
                                        <input type="submit" value="Wyślij"/>

                                    </form>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    ';
                }else{
                $reader = $_SESSION['uid'];

                echo '
                    <div class="content">
                        <h2>Wiadomości</h2>
                        <hr>

                        <div class="leftpanel">
                            <h3>Administratorzy</h3>
                            '; 
                            $selectadmins = DatabaseManager::SelectBySQL("SELECT id FROM users WHERE admin='1'");
                            foreach($selectadmins as $key)
                            {
                                $selectname = DatabaseManager::SelectBySQL("SELECT forename, surname FROM personals WHERE id='$key[0]'");
                                foreach($selectname as $key2)
                                {
                                    $forename = ucwords($key2[0]);
                                    $surname  = ucwords($key2[1]);

                                    echo '<div class="admin">

                                            <form action="messenger" method="POST">
                                                <input type="hidden" name="id" id="id" value="'.$key[0].'"/>
                                                <input type="submit" value="'.$forename.' '.$surname.'" />
                                            </form>
                                          </div>
                                    ';
                                }
                            }
                            
                        echo '
                        </div>
                        
                        <div class="rightpanel">
                            
                            <div class="messages">

                            </div>
                        
                            <div class="send">
                                <form action="messenger" method="POST">
                                
                                    <br>
                                    <textarea id="message" name="message" rows= "3" cols="90"></textarea>

                                    <br><br>

                                    <input type="submit" value="Wyślij"/>
                                </form>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                ';
                    }
                }
            break;

            case 'viewuser':

                $name = $_POST['name'];
                $id = $_POST['id'];

                echo '
                    <div class="content">
                        <h2>Profil użytkownika: '.$name.' <form action="writemessage" method="POST"><input type="hidden" name="id" name="id" value="'.$id.'"/><input type="submit" value="Wyślij wiadomość"/></form></h2>
                        <hr>
                        <h3>Dane: </h3>';
                        $um = new UserManager;
                        $res = $um->ViewUser($id);

                        echo '

                        <h3>Zamówienia: </h3>

                        <table>
                            <tr><td>numer zamówienia</td><td>Data zamówienia</td><td>godzina:</td><td>Cena</td><td>dostawa</td><td>płatność</td><td>Status</td><td>Status admina</td><td>Zmień na wysłano</td><td></td><tr>
                        ';

                        ProductManager::getOrderList('wszystko', $id);
                        
                        echo '
                        </table>
                        <br>
                    </div>
                
                ';

            break;


            case 'orderlist':

                $status = $_POST['status'];
                $adminstatus = $_POST['adminstatus'];

                echo '
                    <div class="content">
                        <h2>Zamówienia ze statusem '.$status.' oraz statusem admina '.$adminstatus.'.</h2>
                        <table>
                        <tr><td>numer zamówienia</td><td>Użytkownik</td><td>Data zamówienia</td><td>godzina:</td><td>Cena</td><td>dostawa</td><td>płatność</td><td>Status</td><td>Status admina</td><td>Zmień na wysłano</td><td></td><tr>
                        '; ProductManager::getOrderList($status, $adminstatus); echo '
                        </table>
                    </div>

                ';

            break;
            case 'adminorders':

                echo '
                    <div class="content">

                        <h2>Zamówienia klientów</h2>

                        <form action="orderlist" method="POST" class="order_form">

                            <label for="status"> Zamówienie(potwierdzony lub niepotwierdzony przez użytkownika): </label><br><br>
                                <input checked type="radio" id="status" name="status" value="potwierdzony">Potwierdzony <br>
                                <input type="radio" id="status" name="status" value="niepotwierdzony">Niepotwierdzony <br>
                                <input type="radio" id="status" name="status" value="wszystko">Wszystko <br>

                                <br><br>

                            <label for="adminstatus"> Status: </label> <br><br>
                                <input checked type="radio" id="adminstatus" name="adminstatus" value="wyslano">Wysłano <br>
                                <input type="radio" id="adminstatus" name="adminstatus" value="niewyslano">Niewysłano <br>
                                <input type="radio" id="adminstatus" name="adminstatus" value="wszystko">Wszystko <br>

                                <br>

                            <input type="submit" value="Szukaj" name="orderlist" id="orderlist">

                        </form>
            
                
                ';
            break;

            case 'adminpanel':

                echo '
                    <div class="content">

                        <h2>Panel Administratora</h2>
                        
                        <div class="one">
                            <div class="addproduct">
                                <a href="addpanel">Dodaj kartę produktu</a>
                            </div>
                            
                            <div class="addproduct">
                                <a href="chooseproduct">Edytuj kartę produktu</a>
                            </div>

                            <div class="adminorders">
                                <a href="adminorders">Zamówienia klientów</a>
                            </div>
                        
                            <div class="clear">
                            </div>

                        </div>

                        <br>
                        <div class="two">

                            <div class="adminorders">
                                <a href="clients">Lista klientów</a>
                            </div>

                            <div class="clear">
                            </div>

                        </div>
                        

                    </div>

                ';
                for($i=0; $i<2; $i++)
                {
                    echo '<br>';
                }
break;

            case 'addpanel':

                echo '
                    <div class="content">

                        <h2>Dodaj kartę produktu</h2>

                        ';
                        for($i=0; $i<2; $i++)
                        {
                            echo '<br>';
                        }
            break;
            
            case 'addpanelError':
                echo '
                    <h5>Nie wypełniłe(a)ś wszystkich pól.</h5>
                    ';
            break;

            case 'updatecorrect':

                echo '
                    <div class="content">

                        <h3>Twój profil został pomyślnie edytowany.</h3>

                    </div>
                
                ';
            
            break;

            case 'clients':
                
                echo '
                    <div class="content">

                        <h3>Lista klientów</h3>
                        
                        <table>
                        
                            <tr><td>id</td><td>Nazwa użytkownika</td></tr>';
                            $um = new UserManager;
                            
                            $res = $um->UsersList();

                            echo '

                        </table>
                
                ';

            break;

            case 'updatenot':

                echo '
                    <div class="content">

                        <h3>Wystąpił błąd.</h3>

                    </div>
                
                ';

            break;

            case 'updatenotlog':

                echo '
                    <div class="content">

                        <h3>Musisz być zalogowany</h3>

                    </div>
                
                ';

            break;

            case 'correct':

            echo '
                    <div class="content">

                        <h3>Produkt został pomyślnie dodany do sklepu.</h3>
                                <br><br>
                        <button><a href="adminpanel">panel administratora</a></button>
                                <br><br>


            ';
            break;

            case 'addproduct':
                    

                echo '
                    <div class="form">

                        <h3>Dodaj Produkt:</h3>

                        <form action="addproduct" enctype="multipart/form-data" method="POST" class="addproduct_form">

                                <br>
                            <div class="left_admin">
                            <label for="name">Tytuł: </label><br>
                            <input type="text" id="name" name="name">

                                <br><br>

                            
                                <label for="typeof">Typ gry: </label><br>
                                <input type="radio" id="typeof" name="typeof" value="rpg">RPG <br>
                                <input type="radio" id="typeof" name="typeof" value="fps">FPS <br>
                                <input type="radio" id="typeof" name="typeof" value="tpp">TPP <br>
                                <input type="radio" id="typeof" name="typeof" value="strategy">Strategia <br>
                                <input type="radio" id="typeof" name="typeof" value="sim">Symulacja <br>
                                <input type="radio" id="typeof" name="typeof" value="sport">Sportowa <br>
                                <input type="radio" id="typeof" name="typeof" value="hs">Hack&Slash <br>
    
                                    <br>

                            <label for="price">Cena: </label><br>
                            <input type="text" id="price" name="price">

                                <br><br>

                            

                            <label for="quantity">Ilość sztuk: </label><br>
                            <input type="number" id="quantity" name="quantity">

                                <br><br>
                                </div>
                                <div class="right_admin">

                                <label for="img">Zdjęcie poglądowe produktu(koniecznie w formacie .png): </label> <br>
                                <input type="file" id="img" name="img" accept="image/png">
                                    <br><br>


                            <label for="platform">Platforma: </label><br>
                            <input type="radio" id="platform" name="platform" value="pc">PC <br>
                            <input type="radio" id="platform" name="platform" value="ps">PlayStation <br>
                            <input type="radio" id="platform" name="platform" value="x">XboX <br>
                            <input type="radio" id="platform" name="platform" value="n">Nintendo <br>

                                <br><br>

                            <label for="producer">Producent: </label><br>
                            <input type="text" id="producer" name="producer" />
                        

                                <br><br><br>

                            <label for="PEGI">PEGI(wiek): </label><br>
                            <input type="text" id="PEGI" name="PEGI">

                                <br><br>

                            <label for="premiere">Premiera: (dzień-miesiąc-rok, przykład: 01-01-2001) </label><br>
                            <input type="date" id="premiere" name="premiere">

                                

                                </div>
                                <div class="clear"></div>

                            <div class="description_admin">
                            <label for="description">Opis(limit 2048 znaków, włącznie ze znakami białymi[spacje]): </label><br>
                            <textarea id="description" name="description" rows= "20" cols="100"></textarea>
                            </div>

                                <br><br>

                                

                                
                            <label for="addproduct">Po dokładnym wypełnieniu wszystkich pól kliknij ten przycisk aby utworzyć stronę produktu.</label><br><br>
                            -----> <input type="submit" value="Dodaj produkt" name="addproduct" id="addproduct"> <-----<br><br>
                            
                        </form>
                    </div>
                </div>

                ';
            break;

            case 'choosevalue':
                    
                $id = $_POST['id'];
                
                if(isset($_POST['name'])){
                echo '
                <div class="content">
                
                <h2>Obecna wartość kolumny nazwa: '.ucfirst($_POST['name']).' </h2>

                <h3>Produkt: </h3>
                <table>
                    <tr><td>id</td><td>nazwa</td><td>platforma</td><td>typ gry</td><td>PEGI</td><td>cena</td><td>sztuk</td><td>premiera</td><td>producent</td><td>Opis</td></tr>
                    '; ProductManager::selectProducts($id); echo '
                </table>
                <br><br>

                <form action="editproduct" method="POST">

                    <label for="name">Wpisz docelową nazwę: </label><br>
                    <input type="text" name="name" id="name"/>

                    <input type="hidden" id="id" name="id" value="'.$id.'"/>
                    
                    <br><br>

                    <input type="submit" name="edit" id="edit" value="Zmień"/>
                </form>
                
                </div>
                ';

                }elseif(isset($_POST['platform'])){
                    echo '
                    <div class="content">
                    
                    <h2>Obecna wartość kolumny platforma: '.$_POST['platform'].' </h2>

                    <h3>Produkt: </h3>
                    <table>
                        <tr><td>id</td><td>nazwa</td><td>platforma</td><td>typ gry</td><td>PEGI</td><td>cena</td><td>sztuk</td><td>premiera</td><td>producent</td><td>Opis</td></tr>
                        '; ProductManager::selectProducts($id); echo '
                    </table>
                    <br><br>

                    <form action="editproduct" method="POST">

                        <label for="name">Wybierz docelową platformę: </label><br>
                        <input checked type="radio" name="platform" id="platform" value="pc"/>PC <br>
                        <input type="radio" name="platform" id="platform" value="ps"/>Playstation <br>
                        <input type="radio" name="platform" id="platform" value="x"/>Xbox <br>
                        <input type="radio" name="platform" id="platform" value="n"/>Nintendo <br>

                        <input type="hidden" id="id" name="id" value="'.$id.'"/>
                        
                        <br><br>

                        <input type="submit" name="edit" id="edit" value="Zmień"/>
                    </form>
                    
                    </div>
                    ';

                }elseif(isset($_POST['typeof'])){
                    echo '
                    <div class="content">
                    
                    <h2>Obecna wartość kolumny typ: '.$_POST['typeof'].' </h2>

                    <h3>Produkt: </h3>
                    <table>
                        <tr><td>id</td><td>nazwa</td><td>platforma</td><td>typ gry</td><td>PEGI</td><td>cena</td><td>sztuk</td><td>premiera</td><td>producent</td><td>Opis</td></tr>
                        '; ProductManager::selectProducts($id); echo '
                    </table>
                    <br><br>

                    <form action="editproduct" method="POST">

                        <label for="name">Wybierz docelowy typ: </label><br>
                            <input checked type="radio" id="typeof" name="typeof" value="rpg">RPG <br>
                            <input type="radio" id="typeof" name="typeof" value="fps">FPS <br>
                            <input type="radio" id="typeof" name="typeof" value="strategy">Strategia <br>
                            <input type="radio" id="typeof" name="typeof" value="sim">Symulacja <br>
                            <input type="radio" id="typeof" name="typeof" value="sport">Sportowa <br>
                            <input type="radio" id="typeof" name="typeof" value="hns">Hack&Slash <br>
                            <input type="radio" id="typeof" name="typeof" value="logic">Gra logiczna <br>
                            <input type="radio" id="typeof" name="typeof" value="br">BattleRoyal <br>
                            <input type="radio" id="typeof" name="typeof" value="fight">Bijatyka <br>

                            <input type="hidden" id="id" name="id" value="'.$id.'"/>
                        
                        <br><br>

                        <input type="submit" name="edit" id="edit" value="Zmień"/>
                    </form>
                    
                    </div>
                    ';

                }elseif(isset($_POST['pegi'])){
                    echo '
                    <div class="content">
                    
                    <h2>Obecna wartość kolumny pegi: '.$_POST['pegi'].' </h2>

                    <h3>Produkt: </h3>
                    <table>
                        <tr><td>id</td><td>nazwa</td><td>platforma</td><td>typ gry</td><td>PEGI</td><td>cena</td><td>sztuk</td><td>premiera</td><td>producent</td><td>Opis</td></tr>
                        '; ProductManager::selectProducts($id); echo '
                    </table>
                    <br><br>

                    <form action="editproduct" method="POST">

                        <label for="name">Wybierz docelowy klasyfikator PEGI: </label><br>
                            <input checked type="radio" id="pegi" name="pegi" value="3">3 <br>
                            <input type="radio" id="pegi" name="pegi" value="7">7 <br>
                            <input type="radio" id="pegi" name="pegi" value="12">12 <br>
                            <input type="radio" id="pegi" name="pegi" value="16">16 <br>
                            <input type="radio" id="pegi" name="pegi" value="18">18 <br>

                            <input type="hidden" id="id" name="id" value="'.$id.'"/>
                            
                        <br><br>

                        <input type="submit" name="edit" id="edit" value="Zmień"/>
                    </form>
                    
                    </div>
                    ';

                }elseif(isset($_POST['price'])){
                    echo '
                    <div class="content">
                    
                    <h2>Obecna wartość kolumny cena: '.$_POST['price'].' </h2>

                    <h3>Produkt: </h3>
                    <table>
                        <tr><td>id</td><td>nazwa</td><td>platforma</td><td>typ gry</td><td>PEGI</td><td>cena</td><td>sztuk</td><td>premiera</td><td>producent</td><td>Opis</td></tr>
                        '; ProductManager::selectProducts($id); echo '
                    </table>
                    <br><br>

                    <form action="editproduct" method="POST">

                        <label for="name">Wpisz docelową wartość cena: </label><br>
                            <input type="number" id="price" name="price"/>

                            <input type="hidden" id="id" name="id" value="'.$id.'"/>
                            
                        <br><br>

                        <input type="submit" name="edit" id="edit" value="Zmień"/>
                    </form>
                    
                    </div>
                    ';

                }elseif(isset($_POST['quantity'])){
                    echo '
                    <div class="content">
                    
                    <h2>Obecna ilość sztuk: '.$_POST['quantity'].' </h2>

                    <h3>Produkt: </h3>
                    <table>
                        <tr><td>id</td><td>nazwa</td><td>platforma</td><td>typ gry</td><td>PEGI</td><td>cena</td><td>sztuk</td><td>premiera</td><td>producent</td><td>Opis</td></tr>
                        '; ProductManager::selectProducts($id); echo '
                    </table>
                    <br><br>

                    <form action="editproduct" method="POST">

                        <label for="name">Wpisz docelową wartość sztuki: </label><br>
                            <input type="number" id="quantity" name="quantity" />

                            <input type="hidden" id="id" name="id" value="'.$id.'"/>
                        
                        <br><br>

                        <input type="submit" name="edit" id="edit" value="Zmień"/>
                    </form>
                    
                    </div>
                    ';

                }elseif(isset($_POST['premiere'])){
                    echo '
                    <div class="content">
                    
                    <h2>Obecna wartość kolumny data premiery: '.$_POST['premiere'].' </h2>

                    <h3>Produkt: </h3>
                    <table>
                        <tr><td>id</td><td>nazwa</td><td>platforma</td><td>typ gry</td><td>PEGI</td><td>cena</td><td>sztuk</td><td>premiera</td><td>producent</td><td>Opis</td></tr>
                        '; ProductManager::selectProducts($id); echo '
                    </table>
                    <br><br>

                    <form action="editproduct" method="POST">

                        <label for="name">Wpisz docelową datę premiery: </label><br>
                            <input type="date" id="premiere" name="premiere"/>

                            <input type="hidden" id="id" name="id" value="'.$id.'"/>
                        <br><br>

                        <input type="submit" name="edit" id="edit" value="Zmień"/>
                    </form>
                    
                    </div>
                    ';

                }elseif(isset($_POST['producer'])){
                    echo '
                    <div class="content">
                    
                    <h2>Obecna wartość kolumny producent: '.$_POST['producer'].' </h2>

                    <h3>Produkt: </h3>
                    <table>
                        <tr><td>id</td><td>nazwa</td><td>platforma</td><td>typ gry</td><td>PEGI</td><td>cena</td><td>sztuk</td><td>premiera</td><td>producent</td><td>Opis</td></tr>
                        '; ProductManager::selectProducts($id); echo '
                    </table>
                    <br><br>

                    <form action="editproduct" method="POST">

                        <label for="name">Wpisz docelową wartość: </label><br>
                        <input type="text" id="producer" name="producer"/>

                        <input type="hidden" id="id" name="id" value="'.$id.'"/>
                        <br><br>

                        <input type="submit" name="edit" id="edit" value="Zmień"/>
                    </form>
                    
                    </div>
                    ';

                }elseif(isset($_POST['description'])){
                    echo '
                    <div class="content">
                    
                    <h2>Obecna wartość kolumny opis: <br></h2>'.$_POST['description'].'

                    <h3>Produkt: </h3>
                    <table>
                        <tr><td>id</td><td>nazwa</td><td>platforma</td><td>typ gry</td><td>PEGI</td><td>cena</td><td>sztuk</td><td>premiera</td><td>producent</td><td>Opis</td></tr>
                        '; ProductManager::selectProducts($id); echo '
                    </table>
                    <br><br>

                    <form action="editproduct" method="POST">

                        <label for="description">Wpisz docelową wartość(limit 2048 znaków, włącznie ze znakami białymi[spacje]): </label><br>
                        <textarea id="description" name="description" rows= "20" cols="100"></textarea>
                            
                            <input type="hidden" id="id" name="id" value="'.$id.'"/>
                            
                        
                        <br><br>

                        <input type="submit" name="edit" id="edit" value="Zmień"/>
                    </form>
                    
                    </div>
                    ';
                }

            break;

            case 'editproduct':

                echo '
                    <div class="content">

                        <h2>Karta produktu została zaktualizowana.</h2>

                    </div>
                
                ';

            break;

            case 'editproducterror':

                echo '
                    <div class="content">

                        <h2>Karta produktu nie może zostać zaktualizowana, ponieważ w bazie już występuje produkt o tej samej nazwie na tę samą platformę.</h2>

                    </div>
                
                ';

            break;

            case 'chooseproduct':
                
                echo '
                    <div class="content">

                        <h2>Lista produktów</h2>
                        <h4>Kliknij interesującą Cię pozycje aby zmienić wartość.</h4>
                        <h5>Kliknięcie id przeniesie Cię do widoku karty przedmiotu.</h5>
                        <table>
                        <tr><td>id</td><td>nazwa</td><td>platforma</td><td>typ gry</td><td>PEGI</td><td>cena</td><td>sztuk</td><td>premiera</td><td>producent</td><td>Opis</td></tr>
                        '; ProductManager::selectProducts(00); echo '
                        </table>
                    </div>
                
                
                ';

            break;

            case 'orders':
                $id = $_SESSION['uid'];

                echo '
                    <div class="content">
                        <h2>Twoje zamówienia:</h2>
                        
                        <div class="date_today">
                            <h3>Zamówienia z dzisiaj:</h3>
                            <table>
                                <tr>
                                    <td>Numer zamówienia </td>  <td>Data zamówienia: </td> <td>Kwota: </td> <td>Status: </td>
                                    '; $pm = ProductManager::getTable(0, $id);
                                    echo '
                                </tr>
                            </table>
                        </div>
                        <div class="date_yesterday">
                            <h3>Zamówienia starsze niż jeden dzień:</h3>
                            <table>
                                <tr>
                                    <td>Numer zamówienia </td>  <td>Data zamówienia: </td> <td>Kwota: </td> <td>Status: </td>
                                    '; $pm = ProductManager::getTable(1, $id);
                                    echo '
                                </tr>
                            </table>
                        </div>
                        <div class="date_week">
                            <h3>Zamówienia starsze niż tydzień:</h3>
                            <table>
                                <tr>
                                    <td>Numer zamówienia </td>  <td>Data zamówienia: </td> <td>Kwota: </td> <td>Status: </td>
                                    '; $pm = ProductManager::getTable(7, $id);
                                    echo '
                                </tr>
                            </table>
                        </div>
                        <div class="date_month">
                            <h3>Zamówienia starsze niż miesiac:</h3>
                            <table>
                                <tr>
                                    <td>Numer zamówienia </td>  <td>Data zamówienia: </td> <td>Kwota: </td> <td>Status: </td>
                                    '; $pm = ProductManager::getTable(31, $id);
                                    echo '
                                </tr>
                            </table>
                        </div>
                        <div class="date_year">
                            <h3>Zamówienia starsze niż rok:</h3>
                            <table>
                                <tr>
                                    <td>Numer zamówienia </td>  <td>Data zamówienia: </td> <td>kwota: </td> <td>Status: </td>
                                    '; $pm = ProductManager::getTable(365, $id);
                                    echo '
                                </tr>
                            </table>
                            <br>
                        </div>
                    </div>
                ';
                
            break;


            case 'rpgps':

            echo'
            <div class="content">

                <h2> Gry RPG na platformę PlayStation: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('ps','rpg');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="rpg" AND platform="ps"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="rpg">
                        <input type="hidden" name="platform" value="ps">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'rpgpc':

            echo'
            <div class="content">

                <h2> Gry RPG na platformę PC: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('pc','rpg');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="rpg" AND platform="pc"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="rpg">
                        <input type="hidden" name="platform" value="pc">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'rpgx':

            echo'
            <div class="content">

                <h2> Gry RPG na platformę Xbox: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('x','rpg');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="rpg" AND platform="x"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="rpg">
                        <input type="hidden" name="platform" value="x">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'rpgn':

            echo'
            <div class="content">

                <h2> Gry RPG na platformę Nintendo: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('n','rpg');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="rpg" AND platform="n"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="rpg">
                        <input type="hidden" name="platform" value="n">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'fpspc':

            echo'
            <div class="content">

                <h2> Gry FPS na platformę PC: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('pc','fps');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="fps" AND platform="pc"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="fps">
                        <input type="hidden" name="platform" value="pc">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'fpsps':

            echo'
            <div class="content">

                <h2> Gry FPS na platformę PlayStation: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('ps','fps');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="fps" AND platform="ps"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="fps">
                        <input type="hidden" name="platform" value="ps">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'fpsx':

            echo'
            <div class="content">

                <h2> Gry FPS na platformę XboX: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('x','fps');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="fps" AND platform="x"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="fps">
                        <input type="hidden" name="platform" value="x">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;
            
            case 'fpsn':

            echo'
            <div class="content">

                <h2> Gry FPS na platformę Nintendo: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('n','fps');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="fps" AND platform="n"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="fps">
                        <input type="hidden" name="platform" value="n">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'tpppc':

            echo'
            <div class="content">

                <h2> Gry TPP na platformę PC: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('pc','tpp');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="tpp" AND platform="pc"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="tpp">
                        <input type="hidden" name="platform" value="pc">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'tppps':

            echo'
            <div class="content">

                <h2> Gry TPP na platformę PlayStation: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('ps','tpp');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="tpp" AND platform="ps"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="tpp">
                        <input type="hidden" name="platform" value="ps">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'tppx':

            echo'
            <div class="content">

                <h2> Gry TPP na platformę Xbox: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('x','tpp');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="tpp" AND platform="x"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="tpp">
                        <input type="hidden" name="platform" value="x">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'tppn':

            echo'
            <div class="content">

                <h2> Gry TPP na platformę Nintendo: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('n','tpp');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="tpp" AND platform="n"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="tpp">
                        <input type="hidden" name="platform" value="n">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'simpc':

            echo'
            <div class="content">

                <h2>Gry Symulatory na platformę PC: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('pc','sim');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="sim" AND platform="pc"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="sim">
                        <input type="hidden" name="platform" value="pc">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'simps':

            echo'
            <div class="content">

                <h2> Gry symulatory na platformę PlayStation: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('ps','sim');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="sim" AND platform="ps"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="sim">
                        <input type="hidden" name="platform" value="ps">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'simx':

            echo'
            <div class="content">

                <h2> Gry symulatory na platformę XboX: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('x','sim');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="sim" AND platform="x"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="sim">
                        <input type="hidden" name="platform" value="x">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'simn':

            echo'
            <div class="content">

                <h2> Gry symulatory na platformę Nintendo: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('n','sim');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="sim" AND platform="n"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="sim">
                        <input type="hidden" name="platform" value="n">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'sportpc':

            echo'
            <div class="content">

                <h2> Gry sportowe na platformę PC: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('pc','sport');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="sport" AND platform="pc"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="sport">
                        <input type="hidden" name="platform" value="pc">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'sportps':

            echo'
            <div class="content">

                <h2> Gry sportowe na platformę PlayStation: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('ps','sport');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="sport" AND platform="ps"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="sport">
                        <input type="hidden" name="platform" value="ps">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'sportx':

            echo'
            <div class="content">

                <h2> Gry sportowe na platformę Xbox: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('x','sport');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="sport" AND platform="x"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="sport">
                        <input type="hidden" name="platform" value="x">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'sportn':

            echo'
            <div class="content">

                <h2> Gry sportowe na platformę Nintendo: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('n','sport');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="sport" AND platform="n"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="sport">
                        <input type="hidden" name="platform" value="n">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'hspc':

            echo'
            <div class="content">

                <h2> Gry hack&slash na platformę PC: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('pc','hs');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="hs" AND platform="pc"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="hs">
                        <input type="hidden" name="platform" value="pc">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'hsps':

            echo'
            <div class="content">

                <h2> Gry hack&slash na platformę PlayStation: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('ps','hs');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="hs" AND platform="ps"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="hs">
                        <input type="hidden" name="platform" value="ps">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'hsx':

            echo'
            <div class="content">

                <h2> Gry hack&slash na platformę XboX: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('x','hs');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="hs" AND platform="x"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="hs">
                        <input type="hidden" name="platform" value="x">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'hsn':

            echo'
            <div class="content">

                <h2> Gry hack&slash na platformę Nintendo: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('n','hs');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="hs" AND platform="n"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="hs">
                        <input type="hidden" name="platform" value="n">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'logicpc':

            echo'
            <div class="content">

                <h2> Gry logiczne na platformę PC: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('pc','logic');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="logic" AND platform="pc"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="logic">
                        <input type="hidden" name="platform" value="pc">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'logicps':

            echo'
            <div class="content">

                <h2> Gry logiczne na platformę PlayStation: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('ps','logic');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="logic" AND platform="ps"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="logic">
                        <input type="hidden" name="platform" value="ps">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'logicx':

            echo'
            <div class="content">

                <h2> Gry logiczne na platformę XboX: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('x','logic');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="logic" AND platform="x"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="logic">
                        <input type="hidden" name="platform" value="x">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'logicn':

            echo'
            <div class="content">

                <h2> Gry logiczne na platformę Nintendo: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('n','logic');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="logic" AND platform="n"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="logic">
                        <input type="hidden" name="platform" value="n">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'brpc':

            echo'
            <div class="content">

                <h2> Gry battle royale na platformę PC: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('pc','br');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="br" AND platform="pc"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="br">
                        <input type="hidden" name="platform" value="pc">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'brps':

            echo'
            <div class="content">

                <h2> Gry battle royale na platformę PlayStation: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('ps','br');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="br" AND platform="ps"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="br">
                        <input type="hidden" name="platform" value="ps">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;
            
            case 'brx':

            echo'
            <div class="content">

                <h2> Gry battle royale na platformę XboX: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('x','br');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="br" AND platform="x"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="br">
                        <input type="hidden" name="platform" value="x">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'brn':

            echo'
            <div class="content">

                <h2> Gry battle royale na platformę Nintendo: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('n','br');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="br" AND platform="n"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="br">
                        <input type="hidden" name="platform" value="n">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'fightpc':

            echo'
            <div class="content">

                <h2>Bijatyki na platformę PC: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('pc','fight');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="fight" AND platform="pc"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="fight">
                        <input type="hidden" name="platform" value="pc">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'fightps':

            echo'
            <div class="content">

                <h2>Bijatyki na platformę PlayStation: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('ps','fight');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="fight" AND platform="ps"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="fight">
                        <input type="hidden" name="platform" value="ps">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'fightx':

            echo'
            <div class="content">

                <h2>Bijatyki na platformę XboX: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('x','fight');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="fight" AND platform="x"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="fight">
                        <input type="hidden" name="platform" value="x">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'fightn':

            echo'
            <div class="content">

                <h2>Bijatyki na platformę Nintendo: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('n','fight');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="fight" AND platform="n"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="fight">
                        <input type="hidden" name="platform" value="n">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;

            case 'strategypc':

            echo'
            <div class="content">

                <h2> Gry strategiczne na platformę PC: </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::getProductList('pc','strategy');
            

            echo '
                </div>
                <div class="productfilter">

                    
                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty WHERE typeof="strategy" AND platform="pc"');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="strategy">
                        <input type="hidden" name="platform" value="pc">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>

                <div class="clear"></div>

            </div>

            ';
            break;
            

            
            case 'vieworder':
            
                echo '<div class="content">
                        <div id="basket">
                <h2>Zamówienie numer '.$_POST['num'].'</h2>

                <table>

                ';
                ProductManager::selectFromOrder();
                echo '

                </table>
            
                    </div>
                </div>

                ';
              
            break;

            case 'productfilter':

            $type = $_POST['type'];
            $platform = $_POST['platform'];
            
            echo'
            <div class="content">

                <h2> Gry ';

                if($type == 'rpg')
                {
                    echo 'RPG';
                }elseif($type == 'fps'){
                    echo 'FPS';
                }elseif($type == 'tpp'){
                    echo 'TPP';
                }elseif($type == 'strategy'){
                    echo 'strategie';
                }elseif($type == 'sim'){
                    echo 'symulatory';
                }elseif($type == 'sport'){
                    echo 'sportowe';
                }elseif($type == 'hs'){
                    echo 'Hack&Slash';
                }elseif($type == 'logic'){
                    echo 'logiczne';
                }elseif($type == 'br'){
                    echo 'battle royale';
                }elseif($type == 'fight'){
                    echo 'bijatyki';
                }

                echo ' na platformę ';
                if($platform == 'pc'){
                    echo 'PC';
                }elseif($platform == 'ps'){
                    echo 'PlayStation';
                }elseif($platform == 'x'){
                    echo 'XboX';
                }elseif($platform == 'n'){
                    echo 'Nintendo';
                }
                
                echo ': </h2>
                <br>

                <div class="productlist">
            ';

            ProductManager::productFilter($_POST);
            

            echo '
                </div>

                <div class="productfilter">

                    <form action="productfilter" method="POST" class="productfilter_form">

                        <h2>Filtry: </h2>

                        <legend>PEGI(wiek): </legend>

                        <input type="checkbox" id="pegi3" name="pegi[]" value="3">
                        <label for="pegi3">3+ </label>
                            <br>
                        <input type="checkbox" id="pegi7" name="pegi[]" value="7">
                        <label for="pegi7">7+ </label>
                            <br>
                        <input type="checkbox" id="pegi12" name="pegi[]" value="12">
                        <label for="pegi12">12+ </label>
                            <br>
                        <input type="checkbox" id="pegi16" name="pegi[]" value="16">
                        <label for="pegi16">16+ </label>
                            <br>
                        <input type="checkbox" id="pegi18" name="pegi[]" value="18">
                        <label for="pegi18">18+ </label>

                            <br><br>

                        <label for="pricemin">Cena(zł) od: </label><br>
                        <input type="number" min="1" max="999" id="pricemin" name="pricemin">
                            <br>
                        <label for="pricemax">Cena(zł) do: </label><br>
                        <input type="number" min="2" max="1000" id="pricemax" name="pricemax">

                            <br><br>
                            
                        <legend>Producent: </legend>
                        ';

                        $select = DatabaseManager::selectBySQL('SELECT DISTINCT producer FROM produkty');
                        foreach($select as $key)
                        {
                            echo '<input type="checkbox" id="producer'.$key[0].'" name="producer[]" value="'.$key[0].'">
                            <label for="producer'.$key[0].'">'.$key[0].'</label><br>';
                        }

                        echo '
                        <input type="hidden" name="type" value="rpg">
                        <input type="hidden" name="platform" value="pc">
                         
                        <input type="submit" value="Filtruj" name="productfilter" class="buttonproductfilter"> 
                        
                    <br><br>

                </div>
                
                <div class="clear"></div>

            </div>
            ';
            break;


                
                

        case 'TheWitcherpc':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='The Witcher' AND platform='pc' AND typeof='rpg' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'TheWitcher2pc':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='The Witcher 2' AND platform='pc' AND typeof='rpg' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'TheWitcher2x':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='The Witcher 2' AND platform='x' AND typeof='rpg' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'TheWitcher3pc':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='The Witcher 3' AND platform='pc' AND typeof='rpg' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'Thewitcher3ps':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='The witcher 3' AND platform='ps' AND typeof='rpg' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'TheWitcher3x':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='The Witcher 3' AND platform='x' AND typeof='rpg' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'BaldursGatepc':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Baldurs Gate' AND platform='pc' AND typeof='rpg' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'BaldursGate2pc':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Baldurs Gate 2' AND platform='pc' AND typeof='rpg' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'IcewindDalepc':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Icewind Dale' AND platform='pc' AND typeof='rpg' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'IcewindDale2pc':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Icewind Dale 2' AND platform='pc' AND typeof='rpg' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'TESIIIMorrowindx':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='TES III Morrowind' AND platform='x' AND typeof='rpg' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'TESIIIMorrowindpc':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='TES III Morrowind' AND platform='pc' AND typeof='rpg' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'ZeldaBreathOfTheWildn':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Zelda Breath Of The Wild' AND platform='n' AND typeof='rpg' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'TESVSkyrimpc':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='TES V Skyrim' AND platform='pc' AND typeof='rpg' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'TESVSkyrimn':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='TES V Skyrim' AND platform='n' AND typeof='rpg' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'TESVSkyrimps':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='TES V Skyrim' AND platform='ps' AND typeof='rpg' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'TESVSkyrimx':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='TES V Skyrim' AND platform='x' AND typeof='rpg' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'Gothicpc':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Gothic' AND platform='pc' AND typeof='rpg' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'GothicIIpc':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Gothic II' AND platform='pc' AND typeof='rpg' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'GodOfWarps':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='God Of War' AND platform='ps' AND typeof='tpp' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'Uncharted4ps':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Uncharted 4' AND platform='ps' AND typeof='tpp' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'GearsOfWarpc':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Gears Of War' AND platform='pc' AND typeof='tpp' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'GearsOfWarx':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Gears Of War' AND platform='x' AND typeof='tpp' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'SuperMarioOdysseyn':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Super Mario Odyssey' AND platform='n' AND typeof='tpp' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'Doompc':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Doom' AND platform='pc' AND typeof='fps' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'Doomps':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Doom' AND platform='ps' AND typeof='fps' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'Doomx':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Doom' AND platform='x' AND typeof='fps' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'Doomn':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Doom' AND platform='n' AND typeof='fps' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'Crysispc':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Crysis' AND platform='pc' AND typeof='fps' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'KillzoneShadowFallps':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Killzone Shadow Fall' AND platform='ps' AND typeof='fps' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'CrusaderKingsIIpc':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Crusader Kings II' AND platform='pc' AND typeof='strategy' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'EuroTruckSimulator2pc':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Euro Truck Simulator 2' AND platform='pc' AND typeof='sim' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'MicrosoftFlightSimulatorXpc':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Microsoft Flight Simulator X' AND platform='pc' AND typeof='sim' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'FIFA19pc':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='FIFA 19' AND platform='pc' AND typeof='sport' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;

                case 'FIFA19ps':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='FIFA 19' AND platform='ps' AND typeof='sport' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;

                case 'FIFA19x':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='FIFA 19' AND platform='x' AND typeof='sport' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;

                case 'FIFA19n':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='FIFA 19' AND platform='n' AND typeof='sport' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'Diablopc':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Diablo' AND platform='pc' AND typeof='hs' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'Diablo2pc':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Diablo 2' AND platform='pc' AND typeof='hs' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'TheSims4ps':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='The Sims 4' AND platform='ps' AND typeof='sim' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'TheSims4x':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='The Sims 4' AND platform='x' AND typeof='sim' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'Spintiresn':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Spintires' AND platform='n' AND typeof='sim' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'Diablo3pc':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Diablo 3' AND platform='pc' AND typeof='hs' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'Diablo3ps':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Diablo 3' AND platform='ps' AND typeof='hs' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'Diablo3x':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Diablo 3' AND platform='x' AND typeof='hs' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'Diablo3n':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Diablo 3' AND platform='n' AND typeof='hs' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'XenobladeChronicles2n':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Xenoblade Chronicles 2' AND platform='n' AND typeof='rpg' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'WolfensteinIIn':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Wolfenstein II' AND platform='n' AND typeof='fps' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'EuropaUniversalisIVpc':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Europa Universalis IV' AND platform='pc' AND typeof='strategy' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'MarioTennisAcesn':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Mario Tennis Aces' AND platform='n' AND typeof='sport' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'DevilMayCryn':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Devil May Cry' AND platform='n' AND typeof='hs' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'TorchlightIIpc':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Torchlight II' AND platform='pc' AND typeof='hs' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'TorchlightIIps':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Torchlight II' AND platform='ps' AND typeof='hs' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'TorchlightIIx':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Torchlight II' AND platform='x' AND typeof='hs' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'TorchlightIIn':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='Torchlight II' AND platform='n' AND typeof='hs' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'GTAVpc':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='GTA V' AND platform='pc' AND typeof='tpp' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'GTAVps':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='GTA V' AND platform='ps' AND typeof='tpp' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case 'GTAVx':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='GTA V' AND platform='x' AND typeof='tpp' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                

        case '4dx':

                $select = DatabaseManager::selectBySQL("SELECT * FROM produkty WHERE name='4d' AND platform='x' AND typeof='strategy' LIMIT 1");
                foreach($select as $arr) {
                    $data = $arr;
                }
                
            
                
                echo <<<END

                <div class="content">
                
                    <br><br>
                
                    <div class="img_page">
END;
 echo ' <img src="'.$data['srcimg']; 
                        echo <<<END
                        " width="200px" height="300px">
                    </div>
                    
                    <div class="product_page">
                        <div class="name_page">
END;
                     echo "
                    <h3>".ucfirst($data['name']);
                    echo <<<END
                    </h3>
                        </div>
                        <div class="infobox_page">
END;
 
                        echo "
                            <br>
                            <p>Platforma:  ".strtoupper($data['platform']);echo "</p>
                            <p>Rodzaj gry: ".strtoupper($data['typeof']);echo "</p>
                            <p>PEGI(wiek): ".$data['PEGI'];echo "</p>
                            <p>Producent: ".$data['producer'];echo "</p>
                            <p>Premiera:   ".$data['premiere'];echo "</p>
                            <p>Dostępność: ".$data['quantity'];echo " szt.</p>
            ";   
             echo '
                         </div>
             
                        <div class="buy_page">
                            <div class="price_page">
                            '; echo "
                                <p>Cena: ".$data['price'];
                                echo <<<END
                                zł</p>
                            </div>
                            <div class="basket_page">
                                <form action="basket" method="POST" class="forbasket_form">
END;
                        echo '
                                    <input type="hidden" name="subpage" value="' .$data['subpage'];echo '">';if($data['quantity'] > 0){echo '<input type="submit" value="Dodaj do koszyka">';}else{echo "produkt niedostępny";}echo '
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
'; echo "
                        <h2>".ucfirst($data['name']);
                        echo <<<END
                        </h2>
                            <br>
END;
                 echo "            
                        <p>".$data['description'];
                        echo <<<END
                        </p>
                    </div>
                </div>
END;


                break;
                
                
                default;
                break;
                            }
                        }
                    }
