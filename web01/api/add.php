<?php
include_once "../base.php";
$table=$_POST['table'];
$db=new DB($table);

$data=[];
if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],'../img/'.$_FILES['img']['name']);
    $data['img']=$_FILES['img']['name'];
}

switch($table){
    case 'title':
        $data['text']=$_POST['text'];
        break;
    case '':
        break;
    case '':
        break;
    case '':
        break;
}

$db->save($data);
to("../backend.php?do=$table");
?>