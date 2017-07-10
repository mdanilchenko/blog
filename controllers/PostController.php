<?php


class PostController extends Controller
{
    public function evalRequest(Request $request,Response $response){
        //Evaling incoming params
        $postId = 0;
        if(isset($this->getParams()[0]) and is_numeric($this->getParams()[0])){
            $postId = $this->getParams()[0];
        }
        //try to get current user
        if(isset($_SESSION['id']) and is_numeric($_SESSION['id'])){
            $user = DAOMethods::getUserById($_SESSION['id']);
            if(!is_null($user)){
                $response->addParam('user',$user);
            }
        }
        //get posts to view
        $response->addParam('post',DAOMethods::getPostById($postId));
        //set page title
        $response->addParam('title','Home page');
        //view It
        $this->goToView('postView',$response);
    }
}