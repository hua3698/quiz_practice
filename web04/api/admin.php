<?php
include_once "../base.php";
if($_POST['ans']!=$_POST['que']){
    echo 1; //驗證碼錯誤
}else{
    $chk=$Admin->count(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
    if($chk){
        echo 2;
        $_SESSION['admin']=$_POST['acc'];
    }else echo 3; //密碼錯
}
?>