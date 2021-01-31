<?php
include_once "../base.php";
$que=$_POST['que'];
$Que->save(['que'=>$que,'subject'=>0,'count'=>0]);
$timo=$Que->find(['que'=>$que]);
foreach($_POST['option'] as $o){
    $Que->save(['que'=>$o,'subject'=>$timo['id'],'count'=>0]);
}
plo("../backend.php?do=que");
?>