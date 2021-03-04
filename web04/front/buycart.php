<?php
if(empty($_SESSION['member'])){
    to("index.php?do=login");
    exit();
}
if(isset($_GET['goods'])){
    $_SESSION['cart'][$_GET['goods']]=$_GET['qt'];
}
?>

<h2 class="ct"><?=$_SESSION['member'];?>的購物車</h2>
<?php 
if(empty($_SESSION['cart'])){
    echo "您的購物車是空的";
    exit();
}
?>
<table class="all">
    <tr class="ct tt">
        <td>訂單編號</td>
        <td>商品名稱</td>
        <td>數量</td>
        <td>庫存量</td>
        <td>單價</td>
        <td>小計</td>
        <td>刪除</td>
    </tr>
    <?php
    foreach($_SESSION['cart'] as $id => $qt){
        $g=$Goods->find($id);
    ?>
    <tr class="pp">
        <td><?=$g['no'];?></a></td>
        <td><?=$g['name'];?></td>
        <td><?=$qt;?></td>
        <td><?=$g['stock'];?></td>
        <td><?=$g['price'];?></td>
        <td><?=$g['price']*$qt;?></td>
        <td><img src="icon/0415.jpg" onclick="del_item(<?=$g['id'];?>)"></td>
    </tr>
    <?php
        }
    ?>
</table>
<div class="ct">
    <a href="index.php"><img src="icon/0411.jpg"></a>
    <a href="?do=check"><img src="icon/0412.jpg"></a>
</div>
<script>
function del_item(id){
    $.post("api/del_item.php",{id},function(){
        location.href="?do=buycart";
    })
}
</script>