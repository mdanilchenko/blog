<?php

class LoginController extends Controller
{
    public function evalRequest(Request $request,Response $response){
        if(isset($_POST['login']) and isset($_POST['password'])){
            $user = DAOMethods::getUserByLogin($_POST['login']);
            if(is_null($user) or empty($user)){
                $response->addParam('error','Invalid login or password');
            }else{
                if(md5($_POST['password'])==$user->getPass()){
                    $_SESSION['id'] = $user->getId();
                }else{
                    $response->addParam('error','Invalid login or password');
                }
            }

        }

        //set page title

        //view It
        if(isset($_SESSION['id']) and ($_SESSION['id']>0)){
            $this->goToController('HomeController', $request,$response);
        }else {
            $response->addParam('title','Login page');
            $this->goToView('loginView', $response);
        }
    }
}