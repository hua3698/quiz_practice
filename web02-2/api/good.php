<?php
include_once "../base.php";
$id=$_POST['id'];
$chk=$Log->count(['acc'=>$_SESSION['login'],'news'=>$id]);
if($chk){
    $Log->del(['acc'=>$_SESSION['login'],'news'=>$id]);
    $new=$News->find($id);
    $new['good']--;
    $News->save($new);
}else{
    $Log->save(['acc'=>$_SESSION['login'],'news'=>$id]);
    $new=$News->find($id);
    $new['good']++;
    $News->save($new);
}
?>