<?php

class Controller
{
    use FunctionsTrait;
    private $params;

    /**
     * Controller constructor.
     * @param $params
     */
    public function __construct($params=array())
    {
        $this->params = $params;
    }

    public  function evalRequest(Request $request,Response $response){
        http_response_code(404);
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param mixed $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }

    public function goToView($view,Response $response){
        include('../views/'.$view.'.php');
    }

    public function goToController($name,Request $request, Response $response){
        $controller =  new $name;
        $controller->setParams($this->params);
        $controller->evalRequest($request, $response);
    }


}