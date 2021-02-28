<?php
include_once "../base.php";

$Member->save($_POST);
to("../backend.php?do=mem");
?>