<?php // use $response->getParam()  for UI

require '../views/header.php';
$error = $response->getParam('error');
?>
<h3 class="form_title">Login:</h3>
<div class="error"><?php if(!empty($error)){print $error;} ?></div>
<form action="" method="post" class="form">
    <div class="row clr"><div class="col-sm-8 label">Login:</div><input class="col-sm-10 field" type="text" name="login" required/></div>
    <div class="row clr"><div class="col-sm-8 label">Password:</div><input class="col-sm-10 field" type="password" name="password" required/></div>
    <div class="row clr"><div class="col-sm-8 label"></div><input class="col-sm-10 submit_btn" type="submit" value="send"/></div>
</form>

<?php
include '../views/footer.php';

?>