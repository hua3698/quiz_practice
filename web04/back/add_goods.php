<h1 class="ct">新增商品</h1>
<form action="api/add_goods.php" method="post" enctype="multipart/form-data">
    <table class="all">
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
            <td class="pp">完成分類後自動分類</td>
        </tr>
        <tr>
            <td class="tt">商品名稱</td>
            <td class="pp"><input type="text" name="name"></td>
        </tr>
        <tr>
            <td class="tt">商品價格</td>
            <td class="pp"><input type="text" name="price"></td>
        </tr>
        <tr>
            <td class="tt">規格</td>
            <td class="pp"><input type="text" name="spec"></td>
        </tr>
        <tr>
            <td class="tt">庫存量</td>
            <td class="pp"><input type="text" name="stock"></td>
        </tr>
        <tr>
            <td class="tt">商品圖片</td>
            <td class="pp"><input type="file" name="img"></td>
        </tr>
        <tr>
            <td class="tt">商品介紹</td>
            <td class="pp"><textarea name="intro" style="width:300px;height:100px"></textarea></td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
        <input type="button" value="返回" onclick="javascript:history.go(-1)">
    </div>
</form>
<script>
getBig()
function getBig(){
    $.post("api/type.php",{'do':'getBig'},function(re){
            $("#big").html(re);
            getMid()
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
