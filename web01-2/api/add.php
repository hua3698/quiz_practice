<?php
include_once "../base.php";
$db=new DB($_POST['table']);
$data=[];
if(isset($_POST['text'])){
    $data['text']=$_POST['text'];
}
if(isset($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/{$_FILES['img']['name']}");
    $data['img']=$_FILES['img']['name'];
}
switch($_POST['table']){
    case 'title':
        $data['sh']=0;
        break;
    case 'bottom':
        $data['bottom']=$_POST['bottom'];
        break;
    case 'total':
        $data['total']=$_POST['total'];
    break;
    case 'menu':
        $data['href']=$_POST['href'];
        $data['sh']=1;
        break;
    default:
    $data['sh']=1;
    break;
}
$db->save($data);
// to("../backend.php?do={$_POST['table']}");
?>