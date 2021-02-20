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
            case '':
                break;
        }
    }
    $db->save($row);
}
to("../backend.php?do={$_GET['table']}");
?>