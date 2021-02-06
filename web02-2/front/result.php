<?php
$timu = $Que->find(['id' => $_GET['timu']]);
$ques = $Que->all(['subject' => $_GET['timu']]);
?>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <span><?= $timu['que']; ?></span></legend>
    <div style="font-weight: 700;" id="t"><?= $timu['que']; ?></div>
    <?php
    foreach ($ques as $q) {
        $vote=($timu['count']!=0)?$timu['count']:1;
        $rate=($q['count']/$vote)*100;
    ?>
        <div style="display: inline-block; width:40%"><?= $q['que']; ?></div>
        <div style="display: inline-block; width:50%;margin:20px">
            <div style="display: inline-block;width:<?=$rate;?>%;height:25px; background:#ccc;"></div>
            <div style="display: inline-block"><?=$q['count'];?>票(<?=$rate;?>%)</div>
        </div>

    <?php
    }
    ?>
    <div class="ct"><a href="?do=que">返回</a></div>
</fieldset>