<?php
include_once "../base.php";
switch($_GET['do']){
    case 'login':
        $chk=$Member->count(['acc'=>$_POST['acc']]);
        if($chk){
            $chkpw=$Member->count(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
            if($chkpw){
                $_SESSION['login']=$_POST['acc'];
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
        $chk=$Member->find(['email'=>$email]);
        if($chk){
            echo "您的密碼為:".$chk['pw'];
        }else{
            echo "查無此資料";
        }
        break;
    case 'reg':
        $chk=$Member->count(['acc'=>$_POST['acc']]);
        if($chk){
            echo 1;//帳號重複
        }else{
            $Member->save($_POST);
        }
        break;
    case '':
        break;
}
?>