<fieldset>
    <legend>忘記密碼</legend>
    <table>
        <tr>
            <td>請輸入信箱以查詢密碼</td>
        </tr>
        <tr>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td><span id="result"></span></td>
        </tr>
    </table>
    <button type="button" onclick="forget()">尋找</button>
</fieldset>
<script>
    function forget() {
        let email = $("#email").val();
        $.post("api/chkacc.php?todo=forget", {
            email
        }, function(re) {
            $("#result").html(re);
        })
    }
</script>