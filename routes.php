<?php
$ROUTES = array(
    array('path'=>"/^.*user\/([0-9]+)\/offset\/([0-9]+)[\/]{0,1}$/","controller"=>"UsersController"),
    array('path'=>"/^.*user\/([0-9]+)[\/]{0,1}$/","controller"=>"UsersController"),
    array('path'=>"/^.*post\/([0-9]+)[\/]{0,1}$/","controller"=>"PostController"),
    array('path'=>"/^.*postadd[\/]{0,1}$/","controller"=>"PostAddController"),
    array('path'=>"/^.*login[\/]{0,1}$/","controller"=>"LoginController"),
    array('path'=>"/^.*logout[\/]{0,1}$/","controller"=>"LogoutController"),
    array('path'=>"/^.*post\/add[\/]{0,1}$/","controller"=>"PostAddController"),
    array('path'=>"/^.*offset\/([0-9]+)[\/]{0,1}$/","controller"=>"HomeController"),
    array('path'=>"/^.*$/","controller"=>"HomeController")

);
?>