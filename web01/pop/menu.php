<?php include_once "../base.php";?>
<h3 class="cent">新增主選單</h3>
<hr>
<form action="api/add.php" method="post" enctype="multipart/form-data">
    <table style="margin: auto;">
        <tr>
            <td>主選單名稱：</td>
            <td><input type="text" name="text" id=""></td>
        </tr>
        <tr>
            <td>選單連結網址：</td>
            <td><input type="text" name="href" id=""></td>
        </tr>
        <tr class="cent">
            <td><input type="submit" value="新增"><input type="reset"></td>
            <td><input type="hidden" name="table" value="<?=$_GET['table'];?>"></td>
        </tr>
    </table>
</form>