<fieldset>
    <legend>帳號管理</legend>
    <form action="api/b_admin.php" method="post">
        <table style="width: 60%; margin:auto;">
            <tr>
                <td style="background-color: #eee;">帳號</td>
                <td style="background-color: #eee;">密碼</td>
                <td style="background-color: #eee;">刪除</td>
            </tr>
            <?php
            $mem = $Mem->all();
            foreach ($mem as $m) {
                if ($m['acc'] != 'admin') {
            ?>
                    <tr>
                        <td><?= $m['acc']; ?></td>
                        <td><?= str_repeat("*", strlen($m['pw'])); ?></td>
                        <td><input type="checkbox" name="del[]" value="<?= $m['id']; ?>"></td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
        <div class="ct">
            <input type="submit" value="確定刪除">
            <input type="reset" value="清空選取">
        </div>
    </form>

    <h2>新增會員</h2>
    <span style="color: red;">*請設定您要註冊的帳號及密碼(最長12字元)</span>
    <table>
        <tr>
            <td>Step1:登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td>Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td>Step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td>Step4:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td>
                <input type="button" value="新增" onclick="reg()">
                <input type="reset" value="清除">
            </td>
            <td></td>
        </tr>
    </table>
</fieldset>
<script>
    function reg() {
        let acc = $("#acc").val();
        let pw = $("#pw").val();
        let pw2 = $("#pw2").val();
        let email = $("#email").val();

        if (acc == "" || pw == "" || pw2 == "" || email == "") {
            alert("不可空白")
        } else if (pw != pw2) {
            alert("密碼錯誤")
        } else {
            $.post("api/chkacc.php?todo=reg", {
                acc,
                pw,
                email
            }, function(res) {
                if (res == 1 || res == '1') {
                    alert("帳號重複")
                } else {
                    alert("註冊完成，歡迎加入")
                    location.href = "?do=login";
                }
            })
        }
    }
</script>