<?php
include_once "../base.php";


switch($_GET['todo']){
    case 'reg':
        $acc=$_POST['acc'];
        $chk=$Mem->count(['acc'=>$acc]);
        if($chk) echo 1;
        else $Mem->save($_POST);
        break;
    case 'forget':
        $email=$_POST['email'];
        $row=$Mem->find(['email'=>$email]);
        if(!empty($row)){
            echo "您的密碼為：{$row['pw']}";
        }else{
            echo "查無此信箱";
        } 
    break;
    case 'login':
        $acc=$_POST['acc'];
        $pw=$_POST['pw'];
        $chk=$Mem->count(['acc'=>$acc]);
        if($chk){
            $c=$Mem->count(['acc'=>$acc,'pw'=>$pw]);
            if($c){
                echo 2; //帳密對
                $_SESSION['login']=$acc;
            }else{
                echo 3; //密碼錯物
            }
        }else{
            echo 1; //查無帳號
        }

    break;
}
