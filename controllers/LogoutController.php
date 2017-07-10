<?php

/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 10.07.17
 * Time: 16:04
 */
class LogoutController extends Controller
{
    public function evalRequest(Request $request,Response $response){
        if(isset($_SESSION['id'])) unset($_SESSION['id']);

        session_destroy();

        header("HTTP/1.1 301 Moved Permanently");
        header("Location: ".Constants::$BASE_URL);
        exit();
    }
}