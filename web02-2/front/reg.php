<fieldset>
    <legend>會員註冊</legend>
    <span style="color:red;">*請設定您要註冊的帳號及密碼（最長12個字元）</span>
    <table>
        <tr>
            <td>Step1:登入帳號</td>
            <td><input type="text" name="" id="acc"></td>
        </tr>
        <tr>
            <td>Step1:登入密碼</td>
            <td><input type="password" name="" id="pw"></td>
        </tr>
        <tr>
            <td>Step3:再次確認密碼</td>
            <td><input type="password" name="" id="pw2"></td>
        </tr>
        <tr>
            <td>Step4:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="" id="email"></td>
        </tr>
        <tr>
            <td>
                <input type="button" value="註冊" onclick="reg()"><input type="reset" value="清除">
            </td>
            <td></td>
        </tr>
    </table>
</fieldset>

<script>
    function reg(){
        let acc=$("#acc").val();
        let pw=$("#pw").val();
        let pw2=$("#pw2").val();
        let email=$("#email").val();
        if(acc==""||pw==""||pw2==""||email==""){
            alert("不可空白");
        }else if(pw!=pw2){
            alert("密碼錯誤");
        }else{
            $.post("api/chkacc.php?do=reg",{acc,pw,email},function(re){
                if(re=='1'){
                    alert("查無帳號")
                }else{
                    alert("註冊完成，歡迎加入")
                    location.href="?do=login"
                }
            })
        }
    }
</script>