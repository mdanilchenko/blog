<div class="row clr post_info">
    <div class="title"><?=$post->getFormedTitle();?></div>
    <div class="body"><?=$post->getFormedText($needCrop);?></div>
    <div class="col-sm-12 author"><a href="<?=Constants::$BASE_URL.'user/'.$post->getUser()->getId();?>">Author: <?=$post->getUser()->getLogin();?></a></div><div class="col-sm-12 comments"><a href="<?=Constants::$BASE_URL.'post/'.$post->getId();?>">Comments: <?=$post->getComments();?></a></div>
</div>