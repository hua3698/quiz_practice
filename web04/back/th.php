<h1 class="ct">商品分類</h1>
<div class="ct">
    <span>新增大分類</span>
    <input type="text" id="big">
    <input type="button" value="新增" onclick="addBig()">
</div>
<div class="ct">
    <span>新增中分類</span>
    <select id="midS"></select>
    <input type="text" id="mid">
    <input type="button" value="新增" onclick="addMid()">
</div>
<table class="all ct">
    <?php
    $all = $Type->all(['parent' => 0]);
    foreach ($all as $a) {
    ?>
        <tr class="tt">
            <td id="big<?=$a['id'];?>"><?= $a['name']; ?></td>
            <td>
                <input type="button" value="修改" onclick="edit('big',<?=$a['id'];?>)">
                <button onclick="del('type',<?= $a['id']; ?>)">刪除</button>
            </td>
        </tr>
        <?php
        $mid = $Type->all(['parent' => $a['id']]);
        foreach ($mid as $m) {
        ?>
            <tr class="pp">
                <td id="mid<?=$m['id'];?>"><?= $m['name']; ?></td>
                <td>
                    <input type="button" value="修改" onclick="edit('mid',<?=$m['id'];?>)">
                    <button onclick="del('type',<?= $m['id']; ?>)">刪除</button>
                </td>
            </tr>
    <?php
        }
    }
    ?>
</table>

<!-- ---------------------------------------------- -->
<h1 class="ct">商品管理</h1>
<div class="ct"><input type="button" value="新增商品" onclick="javascript:location.href='?do=add_goods'"></div>
<div class="ct">
    <select name="" id=""><option value="">所有商品</option></select>
</div>
<table class="all ct">
    <tr class="tt">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>操作</td>
    </tr>
    <?php
    $all = $Goods->all();
    foreach ($all as $a) {
    ?>
        <tr class="pp">
            <td><?= $a['no']; ?></td>
            <td><?= $a['name']; ?></td>
            <td><?= $a['stock']; ?></td>
            <td id="sh"><?= ($a['sh']==1)?'販售中':'已下架'; ?></td>
            <td>
                <input type="button" value="修改" onclick="javascript:location.href='?do=edit_goods&id=<?=$a['id'];?>'">
                <button onclick="del('goods',<?= $a['id']; ?>)">刪除</button>
                <input type="button" value="上架" onclick="sh(<?=$a['id'];?>,'on')">
                <input type="button" value="下架" onclick="sh(<?=$a['id'];?>,'off')">
            </td>
        </tr>
    <?php
    }
    ?>
</table>
<!-- <div class="ct"><a href="index.php"><input type="button" value="返回"></a></div> -->

<script>
getBig();

function addBig(){
    let big=$("#big").val();
    $.post("api/type.php",{'do':'addBig',big},function(){
        getBig();
        location.reload();
    })
}
function getBig(){
    $.post("api/type.php",{'do':'getBig'},function(re){
        $("#midS").html(re);
    })
}
function addMid(){
    let mid=$("#mid").val();
    let bigid=$("#midS").val();
    $.post("api/type.php",{'do':'addMid',bigid,mid},function(){
        getBig();
        location.reload();
    })
}
function edit(type,id){
    let text=prompt("請輸入要修改的分類名稱:",$(`#${type}${id}`).html())
    if(text){
        $(`#${type}${id}`).html(text)
        $.post("api/type.php",{'do':'edit',text,id});
    }
}
function sh(id,status){
    console.log(id,status);
    $.post("api/type.php",{'do':'sh',status,id},function(re){
        // location.reload();
        let t=(re=='1')?'販售中':'已下架'
        $("#sh").html(t)
    });
}
</script>