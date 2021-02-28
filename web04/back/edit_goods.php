<h1 class="ct">修改商品</h1>
<form action="api/add_goods.php" method="post" enctype="multipart/form-data">
    <table class="all">
    <?php
    $g=$Goods->find($_GET['id']);
    ?>
        <tr>
            <td class="tt">所屬大分類</td>
            <td class="pp"><select name="big" id="big" onchange="getMid()"></select></td>
        </tr>
        <tr>
            <td class="tt">所屬中分類</td>
            <td class="pp"><select name="mid" id="mid"></select></td>
        </tr>
        <tr>
            <td class="tt">商品編號</td>
            <td class="pp"><?=$g['no'];?></td>
        </tr>
        <tr>
            <td class="tt">商品名稱</td>
            <td class="pp"><input type="text" name="name" value="<?=$g['name'];?>"></td>
        </tr>
        <tr>
            <td class="tt">商品價格</td>
            <td class="pp"><input type="text" name="price" value="<?=$g['price'];?>"></td>
        </tr>
        <tr>
            <td class="tt">規格</td>
            <td class="pp"><input type="text" name="spec" value="<?=$g['spec'];?>"></td>
        </tr>
        <tr>
            <td class="tt">庫存量</td>
            <td class="pp"><input type="text" name="stock" value="<?=$g['stock'];?>"></td>
        </tr>
        <tr>
            <td class="tt">商品圖片</td>
            <td class="pp"><input type="file" name="img"></td>
        </tr>
        <tr>
            <td class="tt">商品介紹</td>
            <td class="pp"><textarea name="intro" style="width:300px;height:100px"><?=$g['intro'];?></textarea></td>
        </tr>
    </table>
    <div class="ct">
        <input type="hidden" name="id" value="<?=$_GET['id'];?>">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
        <input type="button" value="返回" onclick="javascript:history.go(-1)">
    </div>
</form>
<script>
getBig()
getMid()
    function getBig(){
        $.post("api/type.php",{'do':'getBig'},function(re){
            $("#big").html(re);
        })
    }
    function getMid(){
        let big=$("#big").val()
        console.log(big);
        $.post("api/type.php",{'do':'getMid',big},function(re){
            console.log(re)
            $("#mid").html(re);
        })
    }
</script>
