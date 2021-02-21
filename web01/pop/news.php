<?php include_once "../base.php";?>
<h3 class="cent">新增最新消息資料</h3>
<hr>
<form action="api/add.php" method="post" enctype="multipart/form-data">
    <table style="margin: auto;">
        <tr>
            <td>最新消息資料：</td>
            <td><textarea type="text" name="text" id="" style="width: 185%;height:50px"></textarea></td>
        </tr>
        <tr class="cent">
            <td><input type="submit" value="新增"><input type="reset"></td>
            <td><input type="hidden" name="table" value="<?=$_GET['table'];?>"></td>
        </tr>
    </table>
</form>