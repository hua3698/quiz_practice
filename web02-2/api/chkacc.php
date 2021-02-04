<?php include_once "../base.php";
switch ($_GET['do']) {
    case 'login':
        $acc = $_POST['acc'];
        $pw = $_POST['pw'];
        $a = $Member->count(['acc' => $acc]);

        if ($a) {
            $pp = $Member->count(['acc' => $acc, 'pw' => $pw]);
            if ($pp) {
                $_SESSION['login'] = $acc;
                echo 1; //正確
            } else {
                echo 2; //密碼錯
            }
        } else {
            echo 3; //查無帳號
        }
        break;
        case 'forget':
            $f=$Member->find(['email'=>$_POST['email']]);
            if($f){
                echo "<td>您的密碼為：".$f['pw']."</td>";
            }else{
                echo "查無此資料";
            }
            break;
        case 'reg':
            $acc=$_POST['acc'];
            $chk=$Member->count(['acc'=>$acc]);
            if($chk){
                echo 1;//double
            }else{
                $Member->save($_POST);
            }
            break;
}
