<h1 class="ct">會員管理</h1>
<table class="all">
    <tr class="tt ct">
        <td>姓名</td>
        <td>會員帳號</td>
        <td>註冊日期</td>
        <td>操作</td>
    </tr>
    <?php
    $all=$Mem->all();
    foreach($all as $a){
    ?>
    <tr class="pp">
        <td><?=$a['name'];?></td>
        <td><?=$a['acc'];?></td>
        <td><?=$a['regdate'];?></td>
        <td>
            <input type="button" value="修改" onclick="lof('?do=editmem&id=<?=$a['id'];?>')">
            <input type="button" value="刪除" onclick="del(<?=$a['id'];?>)">
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<script>
    function del(id){
        $.post("api/del.php?db=mem",{id},function(){
            location.href="?do=mem";
        })
    }
</script>