<?php
include_once "../base.php";
$db=new DB($_GET['table']);
print_r($_POST);

foreach($_POST['id'] as $key => $id){
    if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
        $db->del($id);
    }else{
        $row=$db->find($id);
        if(!empty($_POST['text'])) $row['text']=$_POST['text'][$key];

        switch($_GET['table']){
            case 'title':
                $row['sh']=($id==$_POST['sh'])?1:0;
                break;
            case 'admin':
                $row['acc']=$_POST['acc'][$key];
                $row['pw']=$_POST['pw'][$key];
                break;
            case 'total':
                $row['total']=$_POST['total'];
                break;
            case 'bottom':
                $row['bottom']=$_POST['bottom'];
                break;
            case '':
                break;
            default:
                $row['sh']=(in_array($id,$_POST['sh']))?1:0;
                break;
        }
    }
    $db->save($row);
}
to("../backend.php?do={$_GET['table']}");
?>