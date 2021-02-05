<?php
include_once "../base.php";

switch($_GET['do']){
    case 'login':
        $acc=$_POST['acc'];
        $pw=$_POST['pw'];
        $chk=$Member->count(['acc'=>$acc]);
        if($chk){
            $chkpw=$Member->count(['acc'=>$acc,'pw'=>$pw]);
            if($chkpw>0){
                $_SESSION['login']=$acc;
                echo 1;//對
            }else{
                echo 3;//密碼錯誤
            }
        }else{
            echo 2;//查無帳號
        }
        break;
    case 'forget':
        $ema=$Member->find(['email'=>$_POST['email']]);
        if($ema) echo "<td>您的密碼為：{$ema['pw']}</td>";
        else echo "查無此資料";
        break;
    case 'reg':
        $acc=$_POST['acc'];
        $chk=$Member->count(['acc'=>$acc]);
        if($chk){
            echo 1;
        }else{
            $Member->save($_POST);
        }

        break;
}
