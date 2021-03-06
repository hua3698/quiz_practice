<fieldset>
    <!-- <legend>會員登入</legend> -->
    <form>
        <table>
            <tr>
                <td>請輸入信箱以查詢密碼</td>
            </tr>
            <tr>
                <td><input type="text" name="" id="email"></td>
            </tr>
            <tr><td id="pw"></td></tr>
            <tr>
                <td>
                    <input type="button" value="尋找" onclick="find()">
                </td>
            </tr>
        </table>
    </form>
</fieldset>

<script>
    function find() {
        let email = $("#email").val();
        $.post("api/check.php?do=forget", {
            email
        }, function(r) {
            $("#pw").html(r)
        })
    }
</script>