<?php
include_once "../base.php";
$db=new DB($_POST['table']);
print_r($_POST);
foreach($_POST['id'] as $key=> $id){
    if(isset($_POST['del']) && in_array($id,$_POST['del'])){
        $db->del($id);
    }else{
        $row=$db->find($id);
        if(isset($_POST['text'])){
            $row['text']=$_POST['text'][$key];
        }
                
        switch($_POST['table']){
            case 'title':
                $row['sh']=($id==$_POST['sh'])?1:0;
            break;
            default:
            $row['sh']=(in_array($id,$_POST['sh']))?1:0;
            break;
        }
        $db->save($row);
    }
}
to("../backend.php?do={$_POST['table']}");
?>