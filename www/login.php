<?php
if($_POST['logout']=="送信"){
setcookie('id','',time() - 100);
setcookie('password','',time() -100);
var_dump($_COOKIE['id']);
var_dump($_COOKIE['password']);
}
?>
<form action="database.php" method="post">
 id: <input type="text" name="id" />
 password: <input type="text" name="password" />
 <input type="submit" />
</form>

