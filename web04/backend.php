<?php include_once "base.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0057)?do=admin -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>┌精品電子商務網站」</title>
	<link href="css.css" rel="stylesheet" type="text/css">
    <script src="jquery-3.4.1.min.js"></script>
	<script src="js.js"></script>
</head>

<body>
	<div id="main">
		<div id="top">
			<a href="index.php">
				<img src="icon/0416.jpg">
			</a>
			<img src="icon/0417.jpg">
		</div>
		<div id="left" class="ct">
			<div style="min-height:400px;">
			<?php
			$admin=$Admin->find(['acc'=>$_SESSION['admin']]);
			$pr=unserialize($admin['pr']);
			?>
				<a href="?do=admin">管理權限設置</a>
				<a href="?do=th" style="display: <?=(in_array(1,$pr))?'block':'none';?>;">商品分類與管理</a>
				<a href="?do=order" style="display: <?=(in_array(2,$pr))?'block':'none';?>;">訂單管理</a>
				<a href="?do=mem" style="display: <?=(in_array(3,$pr))?'block':'none';?>;">會員管理</a>
				<a href="?do=bot" style="display: <?=(in_array(4,$pr))?'block':'none';?>;">頁尾版權管理</a>
				<a href="?do=news" style="display: <?=(in_array(5,$pr))?'block':'none';?>;">最新消息管理</a>
				<a href="api/logout.php?do=admin" style="color:#f00;">登出</a>
			</div>
		</div>
		<div id="right">
        <?php
            $do=(isset($_GET['do']))?$_GET['do']:'admin';
            $file="back/".$do.".php";
            if(file_exists($file)) include $file;
            else include "back/admin.php";
            ?>
		</div>
        <div id="bottom" style="line-height:70px;background:url(icon/bot.png); color:#FFF;" class="ct"><?=$Bottom->find(1)['bottom'];?></div>
	</div>

</body>

</html>