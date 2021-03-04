<?php
include_once "../base.php";
$db=new DB($_GET['db']);
$db->del($_POST['id']);

?>