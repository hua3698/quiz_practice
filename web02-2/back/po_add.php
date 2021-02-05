<fieldset>
    <legend>新增文章</legend>
    <form action="api/po_add.php" method="POST">
        <table width="80%">
            <tr>
                <td width="30%">文章標題</td>
                <td width="60%"><input type="text" name="title" style="width: 100%;"></td>
            </tr>
            <tr>
                <td width="30%">文章分類</td>
                <td width="60%"><select name="type">
                    <option value="1">健康新知</option>
                    <option value="2">菸害防治</option>
                    <option value="3">癌症防治</option>
                    <option value="4">慢性病防治</option>
                </select></td>
            </tr>
            <tr>
                <td width="30%">文章內容</td>
                <td width="60%">
                    <textarea name="text" id="" style="width:100%;height:200px"></textarea>
                </td>
            </tr>
        </table>
        <div class="ct">
            <input type="submit" value="新增">
            <input type="reset" value="重置">
        </div>
    </form>
</fieldset>