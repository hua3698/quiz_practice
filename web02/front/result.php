<?php
$title = $Que->find($_GET['id']);
$op = $Que->all(['subject' => $_GET['id']]);
?>

<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?= $title['que']; ?></legend>
    <h3><?= $title['que']; ?></h3>
    <?php
    foreach ($op as $o) {
        $all = ($title['count'] != 0) ? $title['count'] : 1;
        $rate = ($o['count'] / $all) * 100;
    ?>
        <span style="display: inline-block;width: 50%;"><?= $o['que']; ?></span>
        <div style="width: 40%;">
            <span style="display: inline-block;margin:10px 0;background:#999;width:<?= $rate; ?>%;height:25px"></span>
            <span><?= $o['count']; ?>票<?= $rate; ?>%</span>
        </div>
    <?php
    }
    ?>
    <div class="ct"><button id="a">返回</button></div>
</fieldset>

<script>
    $("#a").on("click", function() {
        location.href = "?do=que";
    })
</script>