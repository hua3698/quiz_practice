<?php include_once "../base.php";?>
<h3 class="ct">新增標題區圖片</h3>
<hr>
<form action="api/add.php" method="post" enctype="multipart/form-data">
    <table class="ct">
        <tr>
            <td>標題區圖片：</td>
            <td><input type="file" name="img" id=""></td>
        </tr>
        <tr>
            <td>標題區替代文字：</td>
            <td><input type="text" name="text" id=""></td>
        </tr>
        <tr>
            <td><input type="submit" value="新增"><input type="reset"></td>
            <td><input type="hidden" name="table" value="<?=$_GET['table'];?>"></td>
        </tr>
    </table>
</form>