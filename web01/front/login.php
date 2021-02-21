<div style="height:32px; display:block;">
<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
    <?php
$m=$Ad->all(['sh'=>1]);
foreach($m as $m){
    echo $m['id'].".";
    echo $m['text'];
}
?>
</marquee>
</div>
<?php
if(isset($_GET['e'])){
	echo "<script>alert('帳號或密碼錯誤')</script>";
}
?>
<form method="post" action="api/login.php">
	<p class="t botli">管理員登入區</p>
	<p class="cent">帳號 ： <input name="acc" type="text"></p>
	<p class="cent">密碼 ： <input name="pw" type="password"></p>
	<p class="cent"><input value="送出" type="submit"><input type="reset" value="清除"></p>
</form>