<?php
include_once "../base.php";
if(!empty($_GET) && $_GET['do']=='chk'){
    $chk=$Member->count(['acc'=>$_GET['acc']]);
    if($chk || $_GET['acc']=='admin'){
        echo 1;
    }
}else{
    if(!empty($_POST)){
        $Member->save($_POST);
    }
    to("../index.php?do=login");
}
?>