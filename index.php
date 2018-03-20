<?
require_once('/config/config.default.php');
require_once(ROOT.'/components/Autoload.php');
require_once (ROOT.'/components/Twig/Autoloader.php');

$router = new Router();
$router->run();

