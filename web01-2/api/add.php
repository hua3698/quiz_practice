<?php
include_once "../base.php";
$db=new DB($_POST['table']);
$row=[];

if(isset($_POST['text'])){
    $row['text']=$_POST['text'];
}

if(isset($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/{$_FILES['img']['name']}");
    $row['img']=$_FILES['img']['name'];
}

switch($_POST['table']){
    case 'title':
        $row['sh']=0;
    break;
    default:
    $row['sh']=1;
    break;
}
$db->save($row);
to("../backend.php?do={$_POST['table']}");
?>