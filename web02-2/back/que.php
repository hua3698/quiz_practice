<fieldset>
    <legend>新增問卷</legend>
    <form action="api/b_que.php" method="post">
        <table style="width: 90%; margin:auto">
            <tr>
                <td>問卷名稱<input type="text" name="sub"></td>
            </tr>
            <tr class="mm">
                <td>選項<input type="text" name="op[]">
                    <input type="button" value="更多" onclick="more()">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="新增">
                    <input type="reset" value="清空">
                </td>
            </tr>
        </table>
    </form>
</fieldset>

<script>
    function more() {
        $(".mm").after(`
        <tr>
            <td>選項<input type="text" name="op[]" id=""></td>
        </tr>
        `);
    }
</script>