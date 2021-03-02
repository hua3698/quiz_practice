<?php
$type = (!empty($_GET['type'])) ? $_GET['type'] : 0;
if (empty($type)) {
    $goods = $Goods->all(['sh' => 1]);
    $nav = '全部商品';
} else {
    $t = $Type->find($type);
    if ($t['parent'] == 0) {
        $goods = $Goods->all(['sh' => 1, 'big' => $t['id']]);
        $nav = $t['name'];
    } else {
        $goods = $Goods->all(['sh' => 1, 'mid' => $t['id']]);
        $nav = $Type->find($t['parent'])['name']." > " . $t['name'];
    }
}
?>
<h2><?= $nav; ?></h2>
<?php
foreach ($goods as $g) {
?>
    <div class="con">
        <div class="l"><img src="img/<?= $g['img']; ?>" style="width:100%;height:100%"></div>
        <div class="r">
            <div class="a b"><?= $g['name']; ?></div>
            <div class="a" style="margin:2px 0;">價錢:<?= $g['price']; ?>
            <a href="?do=buycart&id=<?=$g['id'];?>&qt=1"><img src="icon/0402.jpg" style="float:right"></a>
            </div>
            <div class="a" style="margin:2px 0;">規格:<?= $g['spec']; ?></div>
            <div class="a">簡介: <pre><?= $g['intro']; ?></pre></div>
        </div>
    </div>
<?php
}
?>