<?php
include_once "../base.php";
$chk=$Log->count(['news'=>$_GET['id'],'acc'=>$_SESSION['login']]);
if($chk){
    $Log->del(['news'=>$_GET['id'],'acc'=>$_SESSION['login']]);
    $news=$News->find($_GET['id']);
    $news['good']--;
    $News->save($news);
}else{
    $Log->save(['news'=>$_GET['id'],'acc'=>$_SESSION['login']]);
    $news=$News->find($_GET['id']);
    $news['good']++;
    $News->save($news);
}
?>