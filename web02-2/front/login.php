<fieldset>
    <legend>會員登入</legend>
    <form>
        <table>
            <tr>
                <td>帳號</td>
                <td><input type="text" name="acc" id="acc"></td>
            </tr>
            <tr>
                <td>密碼</td>
                <td><input type="text" name="pw" id="pw"></td>
            </tr>
            <tr>
                <td>
                    <input type="button" onclick="login()" value="登入">
                    <input type="reset" value="清除">
                    <a href="?do=forget">忘記密碼</a> | 
                    <a href="?do=reg">尚未註冊</a>
                </td>
            </tr>
        </table>
    </form>
</fieldset>

<script>
    function login(){
        let acc=$("#acc").val();
        let pw=$("#pw").val();
        $.post("api/chkacc.php?do=login",{acc,pw},function(re){
            switch(re){
                case '1':
                    if(acc=='admin'){
                        location.href="backend.php";
                    }else{
                        location.href="index.php";
                    }
                    break;
                    case '2':
                    alert("密碼錯誤")
                    location.reload()
                    break;
                    case '3':
                    alert("查無帳號")
                    location.reload()
                    break;
            }
        })

    }
</script>