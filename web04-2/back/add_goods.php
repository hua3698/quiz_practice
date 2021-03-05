<h2 class="ct">新增商品</h2>
<form action="api/add_goods.php" method="post" enctype="multipart/form-data">
    <table class="all">
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
            <td class="pp">完成分類後自動分類</td>
        </tr>
        <tr>
            <td class="ct tt">商品名稱</td>
            <td class="pp"><input type="text" name="name" id=""></td>
        </tr>
        <tr>
            <td class="ct tt">商品價格</td>
            <td class="pp"><input type="text" name="price" id=""></td>
        </tr>
        <tr>
            <td class="ct tt">規格</td>
            <td class="pp"><input type="text" name="spec" id=""></td>
        </tr>
        <tr>
            <td class="ct tt">庫存量</td>
            <td class="pp"><input type="text" name="stock" id=""></td>
        </tr>
        <tr>
            <td class="ct tt">商品圖片</td>
            <td class="pp"><input type="file" name="img" id=""></td>
        </tr>
        <tr>
            <td class="ct tt">商品介紹</td>
            <td class="pp"><textarea name="intro" style="width: 300px;height:150px"></textarea></td>
        </tr>
    </table>
    <div class="ct">
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
            getmid()
        })
    }

    function getmid(){
        let bigid=$("#big").val()
        $.post("api/type.php?do=getmid",{bigid} ,function(r) {
            $("#mid").html(r);
        })
    }

</script>