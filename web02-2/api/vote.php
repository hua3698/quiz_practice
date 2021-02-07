<?php
include_once "../base.php";
$ti=$Que->find($_POST['timu']);
$ti['count']++;
$Que->save($ti);

$ques=$Que->find($_POST['option']);
$ques['count']++;
$Que->save($ques);

to("../index.php?do=result&timu={$ti['id']}");
?>