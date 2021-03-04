<h2 class="ct">會員註冊</h2>
<form action="api/reg.php" method="post">
    <table class="all">
        <tr>
            <td class="tt">姓名</td>
            <td class="pp"><input type="text" name="name" id=""></td>
        </tr>
        <tr>
            <td class="tt">帳號</td>
            <td class="pp"><input type="text" name="acc" id="acc"><input type="button" value="檢測帳號" onclick="chk()"></td>
        </tr>
        <tr>
            <td class="tt">密碼</td>
            <td class="pp"><input type="text" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="tt">電話</td>
            <td class="pp"><input type="text" name="tel" id=""></td>
        </tr>
        <tr>
            <td class="tt">住址</td>
            <td class="pp"><input type="text" name="addr" id=""></td>
        </tr>
        <tr>
            <td class="tt">電子信箱</td>
            <td class="pp"><input type="text" name="email" id=""></td>
        </tr>
    </table>
    <div class="ct"><input type="submit" value="註冊"><input type="reset" value="重置"></div>
</form>
<script>
    function chk() {
        let acc = $("#acc").val();
        $.post("api/chkacc.php", {
            acc
        }, function(r) {
            if (r=='1') alert("帳號已重複")
            else  alert("帳號可使用")
        })
    }
</script>