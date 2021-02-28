<?php
include_once "../base.php";

if(!empty($_FILES['img']['tmp_name'])){
    $_POST['img']=$_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/{$_POST['img']}");
}
if(empty($_POST['id'])){
    $_POST['no']=rand(100000,999999);
    $Goods->save($_POST);
}else{
    $g=$Goods->find($_POST['id']);
    foreach($_POST as $key=> $p){
        if($p!=$g[$key]){
            $g[$key]=$p;
        }
    }
    $Goods->save($g);
}
to("../backend.php?do=th");
