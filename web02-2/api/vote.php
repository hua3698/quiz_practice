<?php
include_once "../base.php";
$timu=$Que->find($_POST['timu']);
$timu['count']++;
$Que->save($timu);

$ques=$Que->find(['subject'=>$_POST['timu']]);
$ques['count']++;
$Que->save($ques);
to("../index.php?do=result&timu={$_POST['timu']}");
?> 