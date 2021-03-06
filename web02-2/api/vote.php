<?php
include_once "../base.php";
// print_r($_POST);
$timo=$Que->find($_POST['timo']);
$timo['count']++;
$Que->save($timo);

$op=$Que->find($_POST['op']);
$op['count']++;
$Que->save($op);

to("../index.php?do=result&id={$_POST['timo']}");
?>