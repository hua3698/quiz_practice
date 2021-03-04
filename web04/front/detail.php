<style>
    .a:nth-of-type(1) {
        flex-grow: 1;
    }

    .a:nth-of-type(2) {
        flex-grow: 1;
    }

    .a:nth-of-type(3) {
        flex-grow: 1;
    }

    .a:nth-of-type(4) {
        flex-grow: 3;
    }

    .a:nth-of-type(4) {
        flex-grow: 1;
    }
</style>
<?php
$g = $Goods->find($_GET['id']);
?>
<h2 class="ct"><?= $g['name']; ?></h2>
<div class="con">
    <div class="l" style="width: 60%;">
        <a href="?do=detail&id=<?= $g['id']; ?>"><img src="img/<?= $g['img']; ?>" style="width:100%;height:100%"></a>
    </div>
    <div class="r">
        <div class="a">分類:<?= $Type->find($g['big'])['name']; ?>><?= $Type->find($g['mid'])['name']; ?></div>
        <div class="a" style="margin:2px 0;">編號:<?= $g['no']; ?></div>
        <div class="a" style="margin:2px 0;">價錢:<?= $g['price']; ?></div>
        <div class="a">簡介:
            <pre><?= $g['intro']; ?></pre>
        </div>
        <div class="a" style="margin:2px 0;">庫存量:<?= $g['stock']; ?></div>
    </div>
</div>
<div class="ct tt">
    <form action="?" method="get">
        我要購買:<input type="number" name="qt" id="">
        <input type="hidden" name="do" value="buycart">
        <input type="hidden" name="goods" value="<?=$g['id'];?>">
        <input type="submit" style="background:url('icon/0402.jpg');width:60px;height:20px">
    </form>
</div>