<fieldset>
    <legend>新增問卷</legend>
    <form action="api/b_que.php" method="POST">
        <table>
            <tr>
                <td>問卷名稱</td>
                <td><input type="text" name="title" id=""></td>
            </tr>
            <tr style="background:#eee" id="add">
                <td colspan="2">選項<input type="text" name="option[]" id=""><button type="button" onclick="more()">更多</button></td>
            </tr>
            <tr>
                <td><input type="submit" value="新增"><input type="reset" value="清空"></td>
            </tr>
        </table>
    </form>
</fieldset>
<script>
    function more(){
        $("#add").after(`
        <tr style="background:#eee">
                <td colspan="2">選項<input type="text" name="option[]" id=""></td>
            </tr>
        `)
    }
</script>