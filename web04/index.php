<?php include_once "base.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>┌精品電子商務網站」</title>
    <link href="css.css" rel="stylesheet" type="text/css">
    <script src="jquery-3.4.1.min.js"></script>
    <script src="js.js"></script>
</head>
<!-- h1.ct+form:post>table.all>tr*6>td.tt.ct+td.pp -->

<body>
    <div id="main">
        <div id="top">
            <a href="index.php">
                <img src="icon/0416.jpg" style="width: 100%;">
            </a>
            <div style="padding:10px;">
                <a href="index.php">回首頁</a> |
                <a href="?do=news">最新消息</a> |
                <a href="?do=look">購物流程</a> |
                <a href="?do=buycart">購物車</a> |
                <?php
                    if(!empty($_SESSION['member'])){
                        echo "<a href='api/logout.php?do=member'>會員登出</a>";
                    }else{
                        echo "<a href='?do=login'>會員登入</a>";
                    }
                    ?>|
                
                    <?php
                    if(!empty($_SESSION['admin'])){
                        echo "<a href='backend.php'>返回管理</a>";
                    }else{
                        echo "<a href='?do=admin'>管理登入</a>";
                    }
                    ?>
            </div>
            <marquee>
                情人節特惠活動 &nbsp; 年終特賣會開跑了  
            </marquee>
            <!-- 情人節特惠活動 &nbsp; 為了慶祝七夕情人節，將舉辦情人兩人到現場有七七折之特惠活動~ -->
        </div>
        <?php
            $count=$Type->q("select sum(`id`) from type where `parent`!=0")[0][0];
            $big=$Type->all(['parent'=>0]);
        ?>
        <div id="left" class="ct">
            <div style="min-height:400px;">
            <div class="ww"><a href="?do=th">全部商品(<?=$count;?>)</a></div>
            <?php
            foreach($big as $b){
                $c=$Type->q("select sum(`id`) from type where `parent`={$b['id']}")[0][0];
                ?>
                <div class="ww"><a href="?do=th"><?=$b['name'];?>(<?=$b;?>)</a></div>
                <?php
            }
            ?>
            </div>
            <span>
                <div>進站總人數</div>
                <div style="color:#f00; font-size:28px;">
                    00005 </div>
            </span>
        </div>
        <div id="right">
            <?php
            $do=(isset($_GET['do']))?$_GET['do']:'main';
            $file="front/".$do.".php";
            if(file_exists($file)) include $file;
            else include "front/main.php";
            ?>
        </div>
        <div id="bottom" style="line-height:70px;background:url(icon/bot.png); color:#FFF;" class="ct"><?=$Bottom->find(1)['bottom'];?></div>
    </div>

</body>

</html>