<?php
include_once "../base.php";
switch($_GET['do']){
    case 'login':
        $acc=$_POST['acc'];
        $pw=$_POST['pw'];
        $chk=$Mem->count(['acc'=>$acc]);
        if($chk){
            $chkpw=$Mem->count(['acc'=>$acc,'pw'=>$pw]);
            if($chkpw){
                $_SESSION['login']=$acc;
                echo 2;
            }else{
                echo 3;
            }
        }else{
            echo 1;
        }
        break;
    case 'forget':
        $email=$_POST['email'];
        $mem=$Mem->find(['email'=>$email]);
        if($mem){
            echo "您的密碼為：".$mem['pw'];
        }else{
            echo "查無此資料";
        }
        break;
    case 'reg':
        $chk=$Mem->count(['acc'=>$acc]);
        if($chk){
            echo 1;
        }else{
            $Mem->save($_POST);
        }
        break;
}
?>