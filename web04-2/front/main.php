<?php
$type=$_GET['type']??0;
if(empty($type)){
    $all=$Goods->all(['sh'=>1]);
    $nav="全部商品";
}else{
    $t=$Type->find($type);
    if($t['parent']==0){
        $all=$Goods->all(['big'=>$type,'sh'=>1]);
        $nav=$t['name'];
    }else{
        $all=$Goods->all(['sh'=>1,'mid'=>$type]);
        $nav=$Type->find($t['parent'])['name']." > ".$t['name'];
    }
}
?>
<h2 class="ct"><?=$nav;?></h2>
<table class="all">
    <?php
    foreach($all as $a){
    ?>
    <tr>
        <td class="pp ct" rowspan="4">
            <a href="?do=detail&id=<?=$a['id'];?>"><img src="img/<?=$a['img'];?>" style="width:100%;"></a>
        </td>
        <td class="tt ct"><?=$a['name'];?></td>
    </tr>
    <tr>
        <td class="pp">價錢:<?=$a['price'];?>
        <?php
                if (empty($_SESSION['mem'])) {
                ?>
                    <a href="?do=login" style="float:right"><img src="icon/0402.jpg" style="width:80px"></a>
                <?php
                } else {
                ?>
                    <a href="?do=buycart&goods=<?=$a['id'];?>&qt=1" style="float:right"><img src="icon/0402.jpg" style="width:80px"></a>
                <?php
                }
                ?>
        </td>
    </tr>
    <tr>
        <td class="pp">規格:<?=$a['spec'];?></td>
    </tr>
    <tr>
        <td class="pp">簡介:<pre><?=$a['intro'];?></pre></td>
    </tr>
    <?php
    }
    ?>
</table>
