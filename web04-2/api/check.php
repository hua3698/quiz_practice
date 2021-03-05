<?php
include_once "../base.php";
$_POST['orddate']=date("Ymd");
$_POST['no']=$_POST['orddate'].rand(100000,999999);
$_POST['cart']=serialize($_SESSION['cart']);
$_POST['acc']=$_SESSION['mem'];
$Ord->save($_POST);
$m=$Mem->find(['acc'=>$_SESSION['mem']]);
$m['total']+=$_POST['total'];
$Mem->save($m);
unset($_SESSION['cart']);
?>
<script>
    alert("訂購成功 \n 感謝您的訂購");
    location.href="../index.php";
</script>