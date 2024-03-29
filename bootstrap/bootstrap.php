<?php
// Устанавливаем временную зону по умолчанию
if (function_exists('date_default_timezone_set')) {
    date_default_timezone_set('Europe/Kiev');    
}

// Ошибки и протоколирование
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL | E_NOTICE | E_STRICT | E_DEPRECATED);

function dd($msg, $mix)
{
	echo "<h3>$msg</h3>";
	echo '<pre>';
	print_r($mix);
	echo '</pre>';
}

function conf($mix)
{
	return include(realpath(__DIR__)."/../config/".$mix.".php"); 
}

function getURI()
{
    if (isset($_SERVER['REQUEST_URI']) and !empty($_SERVER['REQUEST_URI']))
        return trim($_SERVER['REQUEST_URI'], '/');
}

// ============================================
require_once realpath(__DIR__).'/../config/app.php';

require_once CORE.'/View.php';
require_once CORE.'/Controller.php';
require_once CORE.'/Helper.php';
require_once CORE.'/Connection.php';
require_once CORE.'/Model.php';
require_once CORE.'/Router.php';

$router = new Router();
$router->direct(getURI());
