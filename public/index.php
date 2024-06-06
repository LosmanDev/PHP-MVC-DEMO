<?php ;
const BASE_PATH = __DIR__ . '/../';

require BASE_PATH .'Core/functions.php';

spl_autoload_register(function ($class) {

    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});

$router = new \Core\Router();

$routes = require base_path('routes.php');

//Will parse and separate the path from thw query string
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = isset($_POST['method']) ? $_POST['method'] : $_SERVER['REQUEST_METHOD'];

$router -> route($uri, 'GET');
