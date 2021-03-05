<?php
include_once "../base.php";
switch($_GET['do']){
    case 'add_big':
        $Type->save(['name'=>$_POST['big'],'parent'=>0]);
        break;
    case 'getbig':
        $a=$Type->all(['parent'=>0]);
        foreach($a as $a){
            echo "<option value='{$a['id']}'>{$a['name']}</option>";
        }
        break;
    case 'add_mid':
        $id=$Type->find($_POST['mama']);
        $Type->save(['name'=>$_POST['mid'],'parent'=>$id['id']]);
        break;
    case 'edit':
        $t=$Type->find($_POST['id']);
        $t['name']=$_POST['text'];
        $Type->save($t);
        break;
    case 'getmid':
        $a=$Type->all(['parent'=>$_POST['bigid']]);
        foreach($a as $a){
            echo "<option value='{$a['id']}'>{$a['name']}</option>";
        }
        break;
        break;
    case 'sh':
        $a=$Goods->find($_POST['id']);
        $a['sh']=($_POST['s']=='on')?1:0;;
        $Goods->save($a);
        break;
}
?>