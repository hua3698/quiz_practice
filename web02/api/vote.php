<?php include_once "../base.php";
$sub=$Que->find($_POST['id']);
$sub['count']++;
$Que->save($sub);

$option=$Que->find($_POST['vote']);
$option['count']++;
$Que->save($option);

plo("../index.php?do=result&id={$_POST['id']}");
?>