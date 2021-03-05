<?php include_once "base.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>┌精品電子商務網站」</title>
    <link href="css.css" rel="stylesheet" type="text/css">
    <script src="js.js"></script>
    <script src="jquery-1.9.1.min.js"></script>
    <style>
        .s>a{
            background: lightblue!important;
        }
    </style>
</head>

<body>
    <div id="main">
        <div id="top">
            <a href="index.php">
                <img src="icon/0416.jpg" style="width: 69%;">
            </a>
            <div style="padding:10px;">
                <a href="index.php">回首頁</a> |
                <a href="?do=news">最新消息</a> |
                <a href="?do=look">購物流程</a> |
                <a href="?do=buycart">購物車</a> |
                <a href="?do=login">會員登入</a> |
                <a href="?do=admin">管理登入</a>
            </div>
            <marquee>年終特賣會開跑了 &nbsp; 情人節特惠活動</marquee>
            <!-- 情人節特惠活動 &nbsp; 為了慶祝七夕情人節，將舉辦情人兩人到現場有七七折之特惠活動~ -->
        </div>
        <div id="left" class="ct">
            <div style="min-height:400px;">
                <?php
                $all = $Goods->count()[0][0];
                echo "<a href='?'>全部商品($all)</a>";
                $big = $Type->all(['parent' => 0]);
                foreach ($big as $b) {
                ?>
                    <div class="ww"><a href="?type=<?= $b['id']; ?>"><?= $b['name']; ?>(<?= $Goods->count(['sh'=>1,'big' => $b['id']])[0][0]; ?>)</a>
                        <?php
                        $mid = $Type->all(['parent' => $b['id']]);
                        foreach ($mid as $m) {
                        ?>
                            <div class="s"><a href="?type=<?= $m['id']; ?>"><?= $m['name']; ?>(<?= $Goods->count(['sh'=>1,'mid' => $m['id']])[0][0]; ?>)</a></div>
                            <?php
                        }
                        ?>
                        </div>
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
            $do = $_GET['do'] ?? 'main';
            $file = "front/" . $do . ".php";
            if (file_exists($file)) include $file;
            else include "front/main.php";
            ?>
        </div>
        <div id="bottom" style="line-height:70px;background:url(icon/bot.png); color:#FFF;" class="ct">
            頁尾版權 : <?= $Bottom->find(1)['bottom']; ?></div>
    </div>

</body>

</html>