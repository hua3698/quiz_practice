<?php
include_once "../base.php";
$Que->save(['subject'=>0,'que'=>$_POST['title'],'count'=>0]);

$title=$Que->find(['que'=>$_POST['title']]);
foreach($_POST['option'] as $o){
    $Que->save(['subject'=>$title['id'],'que'=>$o,'count'=>0]);
}
to("../backend.php?do=que");
?>