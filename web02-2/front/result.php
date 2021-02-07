<?php
$timu = $Que->find($_GET['timu']);
$ques = $Que->all(['subject' => $timu['id']]);
?>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <span><?= $timu['que']; ?></span></legend>
    <h3><?= $timu['que']; ?></h3>
    <?php
    foreach ($ques as $q) {
        $all = ($timu['count'] != 0) ? $timu['count']: 1;
        $rate =round(($q['count']/$all)*100);
    ?>
        <div style="display: inline-block; width:40%"><?= $q['que']; ?></div>
        <div style="display: inline-block; width:40%">
            <div style="display: inline-block; width:<?=$rate;?>% ;background:#ccc;height:25px;"></div>
            <span><?=$q['count'];?>票(<?=$rate;?>%)</span>
        </div>
    <?php
    }
    ?>
    <div class="ct"><input type="button" onclick="javascript:location.href='?do=que'" value="返回"></div>
</fieldset>