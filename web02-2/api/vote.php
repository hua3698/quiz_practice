<?php
include_once "../base.php";

$ques=$Que->find($_POST);
$ques['count']++;
$Que->save($ques);

$timu=$Que->find(['id'=>$ques['subject']]);
$timu['count']++;
$Que->save($timu);
to("../index.php?do=result&timu={$timu['id']}");
?>