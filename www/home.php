<?php
session_start();
if(!isset($_SESSION['id']) && !isset($_SESSION['password'])){
$_SESSION['id'] = $_POST['id'];
$_SESSION['password'] = $_POST['password'];
$id = $_SESSION['id'];
$password = $_SESSION['password'];
}else{
$id = $_SESSION['id'];
$password = $_SESSION['password'];
}
if($id == 'hoge' && $password == 'Password'){
echo $id.'さんようこそー！';
}
else{
echo 'idかpasswordが違うね。';
}
