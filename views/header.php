<?php
    $user = $response->getParam('user');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <title><?=$response->getParam('title');?></title>
    <link rel="stylesheet" href="<?=Constants::$BASE_URL;?>css/grid24.css" />
    <link rel="stylesheet" href="<?=Constants::$BASE_URL;?>css/main.css?v=1" />
</head>
<body>
<header class="header">
    <h1>Blog-in</h1>
</header>
<div class="row menu">
    <div class="col-sm-8 menu_item"><a href="<?=Constants::$BASE_URL;?>">Home</a></div>
    <?php
     if(!is_null($user) and !empty($user)){ ?>
        <div class="col-sm-8 menu_item"><a href="<?=Constants::$BASE_URL;?>post/add">Add Entry</a></div>
        <div class="col-sm-8 menu_item"><a href="<?=Constants::$BASE_URL;?>logout">Logout</a></div>
     <?php }else{ ?>
    <div class="col-sm-8 menu_item"><a href="<?=Constants::$BASE_URL;?>login">Login</a></div>
  <?php }
    ?>
</div>
