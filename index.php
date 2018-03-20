<?

require_once __DIR__.'\autoloader.php';

use app\core\Router;

session_start();

$router = new Router();

$router->run();