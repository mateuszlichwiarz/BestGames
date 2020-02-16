<?php

class MainPage {

    private $active_page;

    public function __construct($ACTIVE_PAGE) {
        
        $this->active_page = $ACTIVE_PAGE;

        switch($this->active_page) {

            case 'home':
            require_once $this->active_page.".library.php";
            break;

            case 'account':
            require_once $this->active_page.".library.php";
            break;

            case 'adminpanel':
            require_once $this->active_page.".library.php";
            break;

            case 'addproduct':
            require_once $this->active_page.".library.php";
            break;

            case 'insert':
            require_once $this->active_page.".library.php";
            break;

            case 'update':
            require_once $this->active_page.".library.php";
            break;

            case 'updateusers':
            require_once $this->active_page.".library.php";
            break;

            case 'basket':
            require_once $this->active_page.".library.php";
            break;

            case 'rpgpc':
            require_once $this->active_page.".library.php";
            break;

            case 'rpgps':
            require_once $this->active_page.".library.php";
            break;

            case 'rpgx':
            require_once $this->active_page.".library.php";
            break;

            case 'rpgn':
            require_once $this->active_page.".library.php";
            break;

            case 'fpspc':
            require_once $this->active_page.".library.php";
            break;

            case 'fpsps':
            require_once $this->active_page.".library.php";
            break;

            case 'fpsx':
            require_once $this->active_page.".library.php";
            break;

            case 'fpsn':
            require_once $this->active_page.".library.php";
            break;

            case 'tpppc':
            require_once $this->active_page.".library.php";
            break;

            case 'tppps':
            require_once $this->active_page.".library.php";
            break;

            case 'tppx':
            require_once $this->active_page.".library.php";
            break;

            case 'tppn':
            require_once $this->active_page.".library.php";
            break;

            case 'simpc':
            require_once $this->active_page.".library.php";
            break;

            case 'simps':
            require_once $this->active_page.".library.php";
            break;

            case 'simx':
            require_once $this->active_page.".library.php";
            break;

            case 'simn':
            require_once $this->active_page.".library.php";
            break;

            case 'sportpc':
            require_once $this->active_page.".library.php";
            break;

            case 'sportps':
            require_once $this->active_page.".library.php";
            break;

            case 'sportx':
            require_once $this->active_page.".library.php";
            break;

            case 'sportn':
            require_once $this->active_page.".library.php";
            break;

            case 'hspc':
            require_once $this->active_page.".library.php";
            break;

            case 'hsps':
            require_once $this->active_page.".library.php";
            break;

            case 'hsx':
            require_once $this->active_page.".library.php";
            break;

            case 'hsn':
            require_once $this->active_page.".library.php";
            break;

            case 'logicpc':
            require_once $this->active_page.".library.php";
            break;

            case 'logicps':
            require_once $this->active_page.".library.php";
            break;

            case 'logicx':
            require_once $this->active_page.".library.php";
            break;

            case 'logicn':
            require_once $this->active_page.".library.php";
            break;

            case 'brpc':
            require_once $this->active_page.".library.php";
            break;

            case 'brps':
            require_once $this->active_page.".library.php";
            break;

            case 'brx':
            require_once $this->active_page.".library.php";
            break;

            case 'brn':
            require_once $this->active_page.".library.php";
            break;

            case 'fightpc':
            require_once $this->active_page.".library.php";
            break;

            case 'fightps':
            require_once $this->active_page.".library.php";
            break;

            case 'fightx':
            require_once $this->active_page.".library.php";
            break;

            case 'fightn':
            require_once $this->active_page.".library.php";
            break;

            case 'strategypc':
            require_once $this->active_page.".library.php";
            break;

            case 'register':
            require_once $this->active_page.".library.php";
            break;

            case 'registererror':
            require_once $this->active_page.".library.php";
            break;

            case 'login':
            require_once $this->active_page.".library.php";
            break;

            case 'accountlogin':
            require_once $this->active_page.".library.php";
            break;

            case 'logout':
            require_once $this->active_page.".library.php";
            break;

            case 'witcher3pc':
            require_once $this->active_page.".library.php";
            break;
            
            case 'removefrombasket':
            require_once $this->active_page.".library.php";
            break;

            case 'orderdelivery':
            require_once $this->active_page.".library.php";
            break;

            case 'orderpayment':
            require_once $this->active_page.".library.php";
            break;

            case 'ordersummary':
            require_once $this->active_page.".library.php";
            break;

            case 'orderfinalize':
            require_once $this->active_page.".library.php";
            break;
            
            case 'confirmation':
            require_once $this->active_page.".library.php";
            break;
            
            case 'orders':
            require_once $this->active_page.".library.php";
            break;
            
            case 'adminpanelError':
            require_once $this->active_page.".library.php";
            break;

            case 'productfilter':
            require_once $this->active_page.".library.php";
            break;

            case 'vieworder':
            require_once $this->active_page.".library.php";
            break;

            case 'addpanel':
            require_once $this->active_page.".library.php";
            break;

            case 'addpanelError':
            require_once $this->active_page.".library.php";
            break;

            case 'adminorders':
            require_once $this->active_page.".library.php";
            break;

            case 'viewuser':
            require_once $this->active_page.".library.php";
            break;

            case 'orderlist':
            require_once $this->active_page.".library.php";
            break;

            case 'cancelorder':
            require_once $this->active_page.".library.php";
            break;

            case 'updateorders':
            require_once $this->active_page.".library.php";
            break;

            case 'chooseproduct':
            require_once $this->active_page.".library.php";
            break;

            case 'choosevalue':
            require_once $this->active_page.".library.php";
            break;

            case 'editproduct':
            require_once $this->active_page.".library.php";
            break;

            case 'clients':
            require_once $this->active_page.".library.php";
            break;

            case 'sendmessage':
            require_once $this->active_page.".library.php";
            break;

            case 'writemessage':
            require_once $this->active_page.".library.php";
            break;

            case 'messenger':
            require_once $this->active_page.".library.php";
            break;



   
case 'TheWitcherpc':
require_once $this->active_page.".library.php";
break;
   
case 'TheWitcher2pc':
require_once $this->active_page.".library.php";
break;
   
case 'TheWitcher2x':
require_once $this->active_page.".library.php";
break;
   
case 'TheWitcher3pc':
require_once $this->active_page.".library.php";
break;
   
case 'Thewitcher3ps':
require_once $this->active_page.".library.php";
break;
   
case 'TheWitcher3x':
require_once $this->active_page.".library.php";
break;
   
case 'BaldursGatepc':
require_once $this->active_page.".library.php";
break;
   
case 'BaldursGate2pc':
require_once $this->active_page.".library.php";
break;
   
case 'IcewindDalepc':
require_once $this->active_page.".library.php";
break;
   
case 'IcewindDale2pc':
require_once $this->active_page.".library.php";
break;
   
case 'TESIIIMorrowindx':
require_once $this->active_page.".library.php";
break;
   
case 'TESIIIMorrowindpc':
require_once $this->active_page.".library.php";
break;
   
case 'ZeldaBreathOfTheWildn':
require_once $this->active_page.".library.php";
break;
   
case 'TESVSkyrimpc':
require_once $this->active_page.".library.php";
break;
   
case 'TESVSkyrimn':
require_once $this->active_page.".library.php";
break;
   
case 'TESVSkyrimps':
require_once $this->active_page.".library.php";
break;
   
case 'TESVSkyrimx':
require_once $this->active_page.".library.php";
break;
   
case 'Gothicpc':
require_once $this->active_page.".library.php";
break;
   
case 'GothicIIpc':
require_once $this->active_page.".library.php";
break;
   
case 'GodOfWarps':
require_once $this->active_page.".library.php";
break;
   
case 'Uncharted4ps':
require_once $this->active_page.".library.php";
break;
   
case 'GearsOfWarpc':
require_once $this->active_page.".library.php";
break;
   
case 'GearsOfWarx':
require_once $this->active_page.".library.php";
break;
   
case 'SuperMarioOdysseyn':
require_once $this->active_page.".library.php";
break;
   
case 'Doompc':
require_once $this->active_page.".library.php";
break;
   
case 'Doomps':
require_once $this->active_page.".library.php";
break;
   
case 'Doomx':
require_once $this->active_page.".library.php";
break;
   
case 'Doomn':
require_once $this->active_page.".library.php";
break;
   
case 'Crysispc':
require_once $this->active_page.".library.php";
break;
   
case 'KillzoneShadowFallps':
require_once $this->active_page.".library.php";
break;
   
case 'CrusaderKingsIIpc':
require_once $this->active_page.".library.php";
break;
   
case 'EuroTruckSimulator2pc':
require_once $this->active_page.".library.php";
break;
   
case 'MicrosoftFlightSimulatorXpc':
require_once $this->active_page.".library.php";
break;
   
case 'FIFA19pc':
require_once $this->active_page.".library.php";
break;

case 'FIFA19ps':
require_once $this->active_page.".library.php";
break;

case 'FIFA19x':
require_once $this->active_page.".library.php";
break;

case 'FIFA19n':
require_once $this->active_page.".library.php";
break;

   
case 'Diablopc':
require_once $this->active_page.".library.php";
break;
   
case 'Diablo2pc':
require_once $this->active_page.".library.php";
break;
   
case 'TheSims4ps':
require_once $this->active_page.".library.php";
break;
   
case 'TheSims4x':
require_once $this->active_page.".library.php";
break;
   
case 'Spintiresn':
require_once $this->active_page.".library.php";
break;
   
case 'Diablo3pc':
require_once $this->active_page.".library.php";
break;
   
case 'Diablo3ps':
require_once $this->active_page.".library.php";
break;
   
case 'Diablo3x':
require_once $this->active_page.".library.php";
break;
   
case 'Diablo3n':
require_once $this->active_page.".library.php";
break;
   
case 'XenobladeChronicles2n':
require_once $this->active_page.".library.php";
break;
   
case 'WolfensteinIIn':
require_once $this->active_page.".library.php";
break;
   
case 'EuropaUniversalisIVpc':
require_once $this->active_page.".library.php";
break;
   
case 'MarioTennisAcesn':
require_once $this->active_page.".library.php";
break;
   
case 'DevilMayCryn':
require_once $this->active_page.".library.php";
break;
   
case 'TorchlightIIpc':
require_once $this->active_page.".library.php";
break;
   
case 'TorchlightIIps':
require_once $this->active_page.".library.php";
break;
   
case 'TorchlightIIx':
require_once $this->active_page.".library.php";
break;
   
case 'TorchlightIIn':
require_once $this->active_page.".library.php";
break;
   
case 'GTAVpc':
require_once $this->active_page.".library.php";
break;
   
case 'GTAVps':
require_once $this->active_page.".library.php";
break;
   
case 'GTAVx':
require_once $this->active_page.".library.php";
break;
   
case '4dx':
require_once $this->active_page.".library.php";
break;
            }
        }
    }

