<?php // use $response->getParam()  for UI

require '../views/header.php';
$post = $response->getParam('post');
if(!is_null($post) and !empty($post)) {
    $needCrop=false;
    print '<a class="head_home" href="'.Constants::$BASE_URL.'">Home</a>';
    include '../views/postTemplate.php';
}else{
    print '<div class="err">Post not found. Please follow this link to <a href="'.Constants::$BASE_URL.'">Home</a> </div>';
}

include '../views/footer.php';

?>