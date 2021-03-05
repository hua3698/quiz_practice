<h1 class="ct">商品分類</h1>
<div class="ct">新增大分類
    <input type="text" name="big" id="big">
    <input type="button" value="新增" onclick="add_big()">
</div>
<div class="ct">新增中分類
    <select name="" id="mids"></select>
    <input type="text" name="mid" id="mid">
    <input type="button" value="新增" onclick="add_mid()">
</div>

<table class="all">
    <?php
    $big = $Type->all(['parent' => 0]);
    foreach ($big as $b) {
    ?>
        <tr class="tt">
            <td><?= $b['name']; ?></td>
            <td class="ct">
                <input type="button" value="修改" onclick="edit('big',<?= $b['id']; ?>)">
                <input type="button" value="刪除" onclick="del(<?= $b['id']; ?>)">
            </td>
        </tr>
        <?php
        $all = $Type->all(['parent' => $b['id']]);
        foreach ($all as $a) {
        ?>
            <tr class="pp ct">
                <td><?= $a['name']; ?></td>
                <td>
                    <input type="button" value="修改" onclick="edit('mid',<?= $a['id']; ?>)">
                    <input type="button" value="刪除" onclick="del('type',<?= $a['id']; ?>)">
                </td>
            </tr>
    <?php
        }
    }
    ?>
</table>


<h1 class="ct">商品管理</h1>
<div class="ct">
    <input type="button" value="新增商品" onclick="lof('?do=add_goods')">
</div>
<div class="ct">
    <select name="" id="mids">
        <option value="">全部商品</option>
    </select>
</div>

<table class="all">
    <tr class="ct tt">
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
        <tr class="pp ct">
            <td><?= $a['no']; ?></td>
            <td><?= $a['name']; ?></td>
            <td><?= $a['stock']; ?></td>
            <td id="s"><?=($a['sh']==1)?'販售中':'已下架';?></td>
            <td>
                <input type="button" value="修改" onclick="lof('?do=edit_goods&id=<?= $a['id']; ?>')">
                <input type="button" value="刪除" onclick="del('goods',<?= $a['id']; ?>)">
                <input type="button" value="上架" onclick="sh('on',<?= $a['id']; ?>)">
                <input type="button" value="下架" onclick="sh('off',<?= $a['id']; ?>)">
            </td>
        </tr>
    <?php
    }
    ?>
</table>

<script>
    getbig()

    function del(s,id) {
        $.post(`api/del.php?db=${s}`, {
            id
        }, function() {
            location.href = "?do=th";
        })
    }

    function add_big() {
        let big = $("#big").val();
        $.post("api/type.php?do=add_big", {
            big
        }, function() {
            getbig()
            location.reload();
        })
    }

    function add_mid() {
        let mid = $("#mid").val();
        let mama = $("#mids").val();
        $.post("api/type.php?do=add_mid", {
            mid,
            mama
        }, function() {
            location.reload();
        })
    }

    function getbig() {
        $.post("api/type.php?do=getbig", function(r) {
            $("#mids").html(r);
        })
    }

    function edit(t, id) {
        let text=prompt("請輸入要修改的名稱")
        if(text){
            $.post("api/type.php?do=edit",{text,id}, function(r) {
            location.reload();
            })
        }
    }
    function sh(s, id) {
        $.post("api/type.php?do=sh",{s,id}, function(r) {
            location.reload();
            })
    }
</script>