<h1 class="ct">會員註冊</h1>
<form action="api/reg.php" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">姓名</td>
            <td class="pp"><input type="text" name="name" id=""></td>
        </tr>
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp"><input type="text" name="acc" id="acc"><input type="button" value="檢查帳號" onclick="chk()"></td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp"><input type="password" name="pw" id=""></td>
        </tr>
        <tr>
            <td class="tt ct">電話</td>
            <td class="pp"><input type="text" name="tel" id=""></td>
        </tr>
        <tr>
            <td class="tt ct">住址</td>
            <td class="pp"><input type="text" name="addr" id=""></td>
        </tr>
        <tr>
            <td class="tt ct">電子信箱</td>
            <td class="pp"><input type="text" name="email" id=""></td>
        </tr>
    </table>
    <div class="ct"><input type="submit" value="註冊"><input type="reset" value="重置"></div>
</form>

<script>
    function chk(){
        let acc=$("#acc").val();
        $.get("api/reg.php?do=chk",{acc},function(re){
            console.log(re)
            if(re=='1') alert("帳號已重複");
            else alert("帳號可使用")
        })
    }
</script>