<?php
include_once "../base.php";
print_r($_POST);
$Que->save(['que'=>$_POST['sub'],'count'=>0,'parent'=>0]);

$mama=$Que->find(['que'=>$_POST['sub']]);
foreach($_POST['op'] as $o){
    $Que->save(['que'=>$o,'count'=>0,'parent'=>$mama['id']]);
}
to("../backend.php?do=que");
?>