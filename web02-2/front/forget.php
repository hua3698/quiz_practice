<fieldset>
    <table>
        <tr>
            <td>請輸入信箱以查詢密碼</td>
        </tr>
        <tr>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr id="tt"></tr>
        <tr>
            <td><input type="button" value="尋找" onclick="find()">
            </td>
        </tr>
    </table>
</fieldset>


<script>
    function find(){
        let email=$("#email").val();
        $.post("api/chkacc.php?do=forget",{email},function(re){
            $("#tt").html(re)
        })
    }
</script>