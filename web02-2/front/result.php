<?php
$timo = $Que->find($_GET['id']);
?>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?= $timo['que']; ?></legend>
    <?php
    $op = $Que->all(['parent' => $_GET['id']]);
    foreach ($op as $o) {
        $t=(!empty($timo['count']))?$timo['count']:1;
        $rate=round(($o['count']/$t)*100);
    ?>
        <div style="display: inline-block; width:40%"><?= $o['que']; ?></div>
        <div style="display: inline-block; width:35%">
            <div style="display: inline-block; width:<?=$rate;?>%;height:25px;background:#ccc"></div>
            <span><?=$o['count'];?>票(<?=$rate?>%)</span>
        </div>
    <?php
    }
    ?>
    <div class="ct"><a href="?do=que"><input type="button" value="返回"></a></div>
</fieldset>