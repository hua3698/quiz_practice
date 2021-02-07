<?php
include_once "../base.php";
print_r($_POST);
$_POST['sh']=1;
$_POST['good']=0;

$News->save($_POST);
to("../backend.php?do=po");
?>