<?php // use $response->getParam()  for UI

require '../views/header.php';

$author = $response->getParam('author');
$offset = $response->getParam('offset');
if(!is_null($author) and !empty($author)){ ?>
<h3 class="auth_name">Author: <?=$author->getLogin();?></h3>
<?php
}
$posts = $response->getParam('posts');
$needCrop=true;
if(is_array($posts) and (count($response->getParam('posts'))>0)){
    for($i=0;$i<count($posts);$i++){
        $post = $posts[$i];
        include '../views/postTemplate.php';
    }?>
    <div class="show_more"><a href="<?=Constants::$BASE_URL.'user/'.$author->getId().'/offset/'.($offset+3);?>">Show more posts</a></div>
<?php
}else{
    print '<div class="err">Posts not found. Please follow this link to <a href="'.Constants::$BASE_URL.'user/'.$author->getId().'">Home</a> </div>';
}
include '../views/footer.php';

?>