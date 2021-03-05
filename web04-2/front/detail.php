<?php
$a = $Goods->find($_GET['id']);
$big = $Type->find($a['big'])['name'];
$mid = $Type->find($a['mid'])['name'];
?>
<h2 class="ct"><?= $a['name']; ?></h2>
<table class="all">
    <tr>
        <td class="pp ct" rowspan="5">
            <img src="img/<?= $a['img']; ?>" style="width:100%;">
        </td>
        <td class="pp">分類:<?= $big; ?> > <?= $mid; ?></td>
    </tr>
    <tr>
        <td class="pp">編號:<?= $a['no']; ?>
        </td>
    </tr>
    <tr>
        <td class="pp">價格:<?= $a['price']; ?></td>
    </tr>
    <tr>
        <td class="pp">簡介:
            <pre><?= $a['intro']; ?></pre>
        </td>
    </tr>
    <tr>
        <td class="pp">庫存量:<?= $a['stock']; ?></td>
    </tr>
    <tr>
        <td class="tt ct" colspan="2">
            <form action="?" method="get">
                購買數量:
                <input type="number" name="qt" value="1">
                <input type="hidden" name="do" value="buycart">
                <input type="hidden" name="goods" value="<?= $a['id']; ?>">
                <?php
                if (empty($_SESSION['mem'])) {
                ?>
                    <a href="?do=login"><img src="icon/0402.jpg" style="width:80px"></a>
                <?php
                } else {
                ?>
                    <input type="submit" style="width:60px;height:20px;background:url('icon/0402.jpg')">
                <?php
                }
                ?>

            </form>
        </td>
    </tr>
</table>
<div class="ct">
    <input type="button" value="返回" onclick="lof('index.php')">
</div>