<form action="api/b_que.php" method="POST">
    <fieldset>
        <legend>新增問卷</legend>
        <table>
            <tr>
                <td>問卷名稱<input type="text" name="que"></td>
            </tr>
            <tr id="more">
                <td>選項<input type="text" name="option[]"><input type="button" value="更多" onclick="more()"></td>
            </tr>
        </table>
        <div>
            <input type="submit" value="新增"><input type="reset" value="清空">
        </div>
    </fieldset>
</form>


<script>
    function more() {
        let option =`<tr>
                <td>選項<input type="text" name="option[]"></td>
            </tr>`
        $("#more").after(option);
    }
</script>