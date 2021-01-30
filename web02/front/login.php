<form action="api/check.php">
    <fieldset>
        <legend>會員登入</legend>
        <table>
            <tr>
                <td>帳號</td>
                <td><input type="text" name="acc" id="acc"></td>
            </tr>
            <tr>
                <td>密碼</td>
                <td><input type="text" name="pw" id="pw"></td>
            </tr>
        </table>
        <div>
            <input type="button" value="登入" onclick="login()">
            <input type="reset" value="清除">
            <a href="?do=forget">忘記密碼</a> | 
            <a href="?do=reg">尚未註冊</a>
        </div>
    </fieldset>
</form> 

<script>
function login(){
    let acc=$("#acc").val();
    let pw=$("#pw").val();

    $.post("api/chkacc.php?todo=login",{acc,pw},function(re){
        switch(re){
            case '1':
            alert("查無帳號");
                break;
            case '2':
                if(acc=='admin')location.href="backend.php";
                else location.href="index.php";
                break;
            case '3':
                alert("密碼錯誤");
                break;
        }
    })
}
</script>