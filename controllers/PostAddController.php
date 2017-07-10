<?php

class PostAddController extends Controller
{
    public function evalRequest(Request $request,Response $response){
        //Evaling incoming params
        $user = null;
        if(isset($_SESSION['id'])){
            $user = DAOMethods::getUserById($_SESSION['id']);
        }
        if(is_null($user)){
            $this->goToController('HomeController', $request,$response);
        }else {
           $this->goToView('postAddView', $response);
        }
    }
}