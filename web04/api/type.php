<?php
include_once "../base.php";
switch($_POST['do']){
    case 'addBig':
        $Type->save(['name'=>$_POST['big'],'parent'=>0]);
        break;
    case 'getBig':
        $b=$Type->all(['parent'=>0]);
        foreach($b as $b){
        echo "<option value='{$b['id']}'>{$b['name']}</option>";
        }
        break;
    case 'getMid':
        $b=$Type->all(['parent'=>$_POST['big']]);
        foreach($b as $b){
            echo "<option value='{$b['id']}'>{$b['name']}</option>";
        }
        break;
    case 'addMid':
        $Type->save(['name'=>$_POST['mid'],'parent'=>$_POST['bigid']]);
        break;
    case 'sh':
        $b=$Goods->find($_POST['id']);
        $b['sh']=($_POST['status']=='on')?1:0;
        $Goods->save($b);
            print_r($b['sh']);
        break;
    case 'edit':
        // $t=($_POST['type']=='big')?0:$Type->find($_POST['id'])['parent'];
        // $Type->save(['name'=>$_POST['text'],'parent'=>$t]);
        $type=$Type->find($_POST['id']);
        $type['text']=$_POST['text'];
        $Type->save(['id'=>$_POST['id'],'name'=>$_POST['text'],'parent'=>$type['parent']]);
        // print_r($type);
        break;
}
