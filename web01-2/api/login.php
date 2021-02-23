<?php
include_once "../base.php";
$chk=$Admin->count(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
if($chk){
    $_SESSION['login']=$_POST['acc'];
    to("../backend.php");
}else{
    to("../index.php?do=login&e=1");
}
?>