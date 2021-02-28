<h1 class="ct">訂單管理</h1>
<table class="all">
    <tr class="ct tt">
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
        <td><a href="?do=order_detail&id=<?=$a['id'];?>"><?=$a['id'];?></a></td>
        <td><?=$a['total'];?></td>
        <td><?=$a['acc'];?></td>
        <td><?=$a['name'];?></td>
        <td><?=$a['orddate'];?></td>
        <td><button onclick="del('ord',<?=$a['id'];?>)">刪除</button></td>
    </tr>
    <?php
        }
    ?>
</table>
