<?php
include_once "../base.php";
$timu=$_POST['title'];
$Que->save(['subject'=>0,'que'=>$timu,'count'=>0,'sh'=>1]);
$id=$Que->find(['subject'=>0,'que'=>$timu,'count'=>0,'sh'=>1]);

foreach($_POST['option'] as $o){
    $Que->save(['subject'=>$id['id'],'que'=>$o,'sh'=>1,'count'=>0]);
}
to("../backend.php?do=que");
?>