<?php include_once "../base.php";
$id=$_GET['id'];
$chk=$Log->count(['acc'=>$_SESSION['login'],'news'=>$id]);
if($chk>0){
    $Log->del(['acc'=>$_SESSION['login'],'news'=>$id]);
    $news=$News->find($id);
    $news['good']--;
    $News->save($news);
}else{
    $Log->save(['acc'=>$_SESSION['login'],'news'=>$id]);
    $news=$News->find($id);
    $news['good']++;
    $News->save($news);
}
?>