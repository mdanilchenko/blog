<?php

class HomeController extends Controller
{
    public function evalRequest(Request $request,Response $response){
        //Evaling incoming params
        $offset = 0;
        if(isset($this->getParams()[0]) and is_numeric($this->getParams()[0])){
            $offset = $this->getParams()[0];
        }
        $response->addParam('offset',$offset);
        //try to get current user
        if(isset($_SESSION['id']) and is_numeric($_SESSION['id'])){
            $user = DAOMethods::getUserById($_SESSION['id']);
            if(!is_null($user)){
                $response->addParam('user',$user);
            }
        }
        //get posts to view
        $response->addParam('posts',DAOMethods::getPosts($response->getParam('offset')));
        //set page title
        $response->addParam('title','Home page');
        //view It
        $this->goToView('postsView',$response);
    }
}