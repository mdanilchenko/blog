<?php // use $response->getParam()  for UI

require '../views/header.php';
$error = $response->getParam('error');
?>
    <h3 class="form_title">App Post:</h3>
    <div class="error"><?php if(!empty($error)){print $error;} ?></div>
    <form action="" method="post" class="form">
        <div class="row clr"><div class="col-sm-8 label">Title:</div><input class="col-sm-10 field" type="text" name="title" required/></div>
        <div class="row clr"><div class="col-sm-8 label">Text:</div><textarea class="col-sm-10 field" name="text" required></textarea></div>
       <div class="row clr"><div class="col-sm-8 label">Date:</div><input class="col-sm-10 field" type="text" name="title" value="<?=date('d.m.Y');?>"  required/></div>
        <div class="row clr"><div class="col-sm-8 label"></div><input class="col-sm-10 submit_btn" type="submit" value="SAVE"/></div>
    </form>

<?php
include '../views/footer.php';

?>