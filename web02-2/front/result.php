<?php
$timu = $Que->find($_GET['timu']);
?>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <span><?= $timu['que']; ?></span></legend>
    <h3><?= $timu['que']; ?></h3>
    <?php
    $ques = $Que->all(['subject' => $timu['id']]);
    foreach ($ques as $q) {
        $all=($timu['count']!=0)?$timu['count']:1;
        $rate=round(($q['count']/$all)*100);
    ?>
        <div style="display: inline-block;width:40%"><?= $q['que']; ?></div>
        <div style="display: inline-block;width:50%">
            <div style="display: inline-block;background:#ccc;height:25px;width:<?=$rate;?>%"></div>
            <span><?= $q['count']; ?>票(<?= $rate; ?>%)</span>
        </div>
    <?php
    }
    ?>
    <div class="ct"><a href="?do=que"><input type="button" value="返回"></a></div>
</fieldset>