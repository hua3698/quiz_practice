<style>
    .all td{
        min-width: 70px!important;
    }
</style>
<?php

if(isset($_GET['goods'])){
    $_SESSION['cart'][$_GET['goods']]=$_GET['qt']??'';
}
?>
<h2 class="ct"><?=$_SESSION['mem'];?>的購物車</h2>
<?php
if(empty($_SESSION['cart'])){
    echo "購物車是空的";
    exit();
}
?>
<table class="all">
    <tr>
        <td class="ct tt">編號</td>
        <td class="ct tt">商品名稱</td>
        <td class="ct tt">數量</td>
        <td class="ct tt">庫存量</td>
        <td class="ct tt">單價</td>
        <td class="ct tt">小計</td>
        <td class="ct tt">刪除</td>
    </tr>
    <?php
    foreach($_SESSION['cart'] as $id=>$qt){
        $a=$Goods->find($id);
    ?>
    <tr>
        <td class="pp"><?=$a['no'];?></td>
        <td class="pp"><?=$a['name'];?></td>
        <td class="pp"><?=$qt;?></td>
        <td class="pp"><?=$a['stock'];?></td>
        <td class="pp"><?=$a['price'];?></td>
        <td class="pp"><?=$a['price']*$qt;?></td>
        <td class="pp"><img src="icon/0415.jpg"  onclick="del_item(<?= $id; ?>)"></td>
    </tr>
    <?php
}
?>
</table>
<div class="ct">
    <img src="icon/0411.jpg" onclick="lof('index.php')">
    <img src="icon/0412.jpg" onclick="lof('?do=check')">
</div>

<script>
    function del_item(id) {
        $.post("api/del_item.php", {
            id
        }, function() {
            location.href = "?do=buycart";
        })
    }
</script>