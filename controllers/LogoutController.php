<?php

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