<?php
ob_start();


$AbsoluteURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';
$dirCat = dirname($_SERVER['PHP_SELF']);
$AbsoluteURL .= $_SERVER['HTTP_HOST'];
$AbsoluteURL .= $dirCat != '\\' ? $dirCat : "";
$slash = substr($AbsoluteURL, -1);

$NewURL = $slash != '/' ? $AbsoluteURL.'/' : $AbsoluteURL;


define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PW', '');
define('DB_DB', 'sklep');

define('SERVER_ADDRESS', $NewURL);

set_include_path(get_include_path(). PATH_SEPARATOR . "CLASS");
set_include_path(get_include_path(). PATH_SEPARATOR . "CLASS/Managers");
set_include_path(get_include_path(). PATH_SEPARATOR . "LIBRARY");


function __autoload($className) {

    include_once($className.".class.php");

}

?>