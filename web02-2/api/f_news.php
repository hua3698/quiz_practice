<?php
include_once "../base.php";
$l=$Log->find(['acc'=>$_SESSION['login'],'news'=>$_POST['id']]);
if($l){
    $Log->del(['acc'=>$_SESSION['login'],'news'=>$_POST['id']]);
    $n=$News->find($_POST['id']);
    $n['good']--;
    $News->save($n);
}else{
    $Log->save(['acc'=>$_SESSION['login'],'news'=>$_POST['id']]);
    $n=$News->find($_POST['id']);
    $n['good']++;
    $News->save($n);
}
?>