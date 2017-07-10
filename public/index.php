<?php
session_start();
ini_set("display_errors","On");
spl_autoload_register(function ($class)
{
    if(file_exists($class.'.php')){
        require($class.'.php');
    }else if(file_exists('../controllers/'.$class.'.php')){
        require('../controllers/'.$class.'.php');
    }else if(file_exists('../beans/'.$class.'.php')){
        require('../beans/'.$class.'.php');
    }else if(file_exists('../core/'.$class.'.php')){
        require('../core/'.$class.'.php');
    }else if(file_exists('../dao/'.$class.'.php')){
        require('../dao/'.$class.'.php');
    }else if(file_exists('../views/'.$class.'.php')){
        require('../views/'.$class.'.php');
    }else if(file_exists('../security/'.$class.'.php')){
        require('../security/'.$class.'.php');
    }
});

try {
    require('../routes.php');
    Routing::fromArray($ROUTES);
}catch(Exception $ex){
    http_response_code(500); exit;
}

$request = new Request($_GET,$_POST,$_COOKIE,$_SERVER,$_SESSION);
$response = new Response();

$controller = Routing::getController($_SERVER['REQUEST_URI']);
$controller->evalRequest($request, $response);

?>

