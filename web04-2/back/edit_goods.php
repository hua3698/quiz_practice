<h2 class="ct">修改商品</h2>
<form action="api/add_goods.php" method="post" enctype="multipart/form-data">
    <table class="all">
    <?php
    $a=$Goods->find($_GET['id']);
    ?>
        <tr>
            <td class="ct tt">所屬大分類</td>
            <td class="pp">
                <select name="big" id="big" onchange="getmid()"></select>
            </td>
        </tr>
        <tr>
            <td class="ct tt">所屬中分類</td>
            <td class="pp">
                <select name="mid" id="mid"></select>
            </td>
        </tr>
        <tr>
            <td class="ct tt">商品編號</td>
            <td class="pp"><?=$a['no'];?></td>
        </tr>
        <tr>
            <td class="ct tt">商品名稱</td>
            <td class="pp"><input type="text" name="name" value="<?=$a['name'];?>"></td>
        </tr>
        <tr>
            <td class="ct tt">商品價格</td>
            <td class="pp"><input type="text" name="price" value="<?=$a['price'];?>"></td>
        </tr>
        <tr>
            <td class="ct tt">規格</td>
            <td class="pp"><input type="text" name="spec" value="<?=$a['spec'];?>"></td>
        </tr>
        <tr>
            <td class="ct tt">庫存量</td>
            <td class="pp"><input type="text" name="stock" value="<?=$a['stock'];?>"></td>
        </tr>
        <tr>
            <td class="ct tt">商品圖片</td>
            <td class="pp"><input type="file" name="img" id=""></td>
        </tr>
        <tr>
            <td class="ct tt">商品介紹</td>
            <td class="pp"><textarea name="intro" style="width: 300px;height:150px"><?=$a['intro'];?></textarea></td>
        </tr>
    </table>
    <div class="ct">
    <input type="hidden" name="no" value="<?=$a['no'];?>">
    <input type="hidden" name="id" value="<?=$a['id'];?>">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
        <input type="button" value="返回" onclick="history.go(-1)">
    </div>
</form>
<script>
    getbig()

    function getbig() {
        $.post("api/type.php?do=getbig", function(r) {
            $("#big").html(r);
            $("#big option[value='<?=$a['big'];?>']").prop("selected",true);
            getmid()
        })
    }

    function getmid(){
        let bigid=$("#big").val()
        $.post("api/type.php?do=getmid",{bigid} ,function(r) {
            $("#mid").html(r);
            $("#mid option[value='<?=$a['mid'];?>']").prop("selected",true);
        })
    }

</script>