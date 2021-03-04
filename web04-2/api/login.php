<?php
include_once "../base.php";
if($_POST['que']==$_POST['ans']){
    $db=new DB($_GET['do']);
    $chk=$db->count(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
    if($chk){
        $_SESSION[$_GET['do']]=$_POST['acc'];
        echo 2;
    }else echo 3; //密碼錯
}else{
    echo 1; //驗證錯
}
?>