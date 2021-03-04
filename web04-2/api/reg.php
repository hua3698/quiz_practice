<?php
include_once "../base.php";
$_POST['total']=0;
$Mem->save($_POST);
to("../index.php?do=login");
?>