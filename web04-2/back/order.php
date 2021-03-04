<h1 class="ct">訂單管理</h1>
<table class="all ct">
    <tr class="tt">
        <td>訂單編號</td>
        <td>金額</td>
        <td>會員帳號</td>
        <td>姓名</td>
        <td>下單時間</td>
        <td>操作</td>
    </tr>
    <?php
    $all=$Ord->all();
    foreach($all as $a){
    ?>
    <tr class="pp">
        <td><a href="?do=detail&no=<?=$a['no'];?>"><?=$a['no'];?></a></td>
        <td><?=$a['total'];?></td>
        <td><?=$a['acc'];?></td>
        <td><?=$a['name'];?></td>
        <td><?=$a['orddate'];?></td>
        <td><input type="button" value="刪除" onclick="del(<?=$a['id'];?>)"></td>
    </tr>
    <?php
    }
    ?>
</table>
<script>
    function del(id){
        $.post("api/del.php?db=ord",{id},function(){
            location.href="?do=order";
        })
    }
</script>