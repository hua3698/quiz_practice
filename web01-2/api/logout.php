<?php
include_once "../base.php";
reset($_SESSION['login']);
to("../index.php?do=login");
?>