<?php

session_start();
if(!isset($_COOKIE['id']) && !isset($_COOKIE['password'])){
$id = $_POST['id'];
$password = $_POST['password'];
setcookie('id',$id, time() + 60 * 60 * 24);
setcookie('password',$password, time() + 60 * 60 * 24);
}else{
$id = $_COOKIE['id'];
$password = $_COOKIE['password'];
}
if($id == 'hoge' && $password == 'Password'){
echo $id.'さんようこそー！';
}
else{
echo 'idかpasswordが違うね。';
}
