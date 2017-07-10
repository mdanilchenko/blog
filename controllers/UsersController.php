<?php

class UsersController extends Controller
{

    public function evalRequest(Request $request,Response $response){
        //Evaling incoming params
        $author = 0;
        $authorUser = null;
        if(isset($this->getParams()[0]) and is_numeric($this->getParams()[0])){
            $author = $this->getParams()[0];
            $authorUser = DAOMethods::getUserById($author);
        }
        $response->addParam('author',$authorUser);
        $offset = 0;
        if(isset($this->getParams()[1]) and is_numeric($this->getParams()[1])){
            $offset = $this->getParams()[1];
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
        $response->addParam('posts',DAOMethods::getPosts($response->getParam('offset'),3,$author));
        //set page title
        if(!is_null($authorUser) and !empty($authorUser)) {
            $response->addParam('title','Author: ' .$authorUser->getLogin());
        }else{
            $response->addParam('title','Authors page ');
        }
        //view It
        $this->goToView('authorPostsView',$response);
    }
}