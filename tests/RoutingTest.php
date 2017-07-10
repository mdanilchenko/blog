
<?php
spl_autoload_register(function ($class)
{
    if(file_exists($class.'.php')){
        require($class.'.php');
    }else if(file_exists('../controllers/'.$class.'.php')){
        require('../controllers/'.$class.'.php');
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

class RoutingTest extends PHPUnit_Framework_TestCase
{
    public function testUsersRoute(){
        try {
            require('../routes.php');
            Routing::fromArray($ROUTES);
        }catch(Exception $ex){
            http_response_code(500); exit;
        }

        $controller = Routing::getController('/user/14909');
        $this->assertInstanceOf('UsersController', $controller,"/user/14909 - invalid evalutor");

        $controller = Routing::getController('/user/14909re');
        $this->assertNotInstanceOf('UsersController', $controller,"/user/14909re - invalid evalutor");

        $controller = Routing::getController('/user/14909/re');
        $this->assertNotInstanceOf('UsersController', $controller,"/user/14909/re - invalid evalutor");

        $controller = Routing::getController('/user/14909/info');
        $this->assertInstanceOf('UsersController', $controller,"/user/14909/info - invalid evalutor");

        $controller = Routing::getController('/user/14909/info/');
        $this->assertInstanceOf('UsersController', $controller,"/user/14909/info/ - invalid evalutor");

        $controller = Routing::getController('/user/');
        $this->assertNotInstanceOf('UsersController', $controller,"/user/ - invalid evalutor");

        $controller = Routing::getController('/user');
        $this->assertNotInstanceOf('UsersController', $controller,"/user - invalid evalutor");
    }
}
