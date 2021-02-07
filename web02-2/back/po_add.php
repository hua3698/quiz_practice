<form action="api/po_add.php" method="POST">
    <table width="90%" style="margin: auto;">
        <tr>
            <td width="30%">文章標題</td>
            <td width="60%"><input type="text" name="title" style="width:90%"></td>
        </tr>
        <tr>
            <td>文章分類</td>
            <td><select name="type" id="">
                <option value="1">健康新知</option>
                <option value="2">菸害防治</option>
                <option value="3">癌症防治</option>
                <option value="4">慢性病防治</option>
            </select></td>
        </tr>
        <tr>
            <td>文章內容</td>
            <td><textarea name="text" style="width:90%;height:200px;"></textarea></td>
        </tr>
        <tr>
            <td><input type="submit" value="新增"><input type="reset" value="清除"></td>
        </tr>
    </table>
</form>