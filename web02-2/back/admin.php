<fieldset>
    <legend>帳號管理</legend>
    <form action="api/b_admin.php" method="post">
        <table style="width: 90%; margin:auto" class="ct">
            <tr>
                <td>帳號</td>
                <td>密碼</td>
                <td>刪除</td>
            </tr>
            <?php
            $all = $Member->all();
            foreach ($all as $a) {
                if ($a['acc'] != 'admin') {
            ?>
                    <tr>
                        <td><?= $a['acc']; ?></td>
                        <td><?= str_repeat("*", strlen($a['pw'])); ?></td>
                        <td><input type="checkbox" name="del[]" value="<?= $a['id']; ?>"></td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
        <div class="ct">
            <input type="hidden" name="id[]" value="<?=$a['id'];?>">
            <input type="submit" value="確定刪除">
            <input type="reset" value="清除">
        </div>
    </form>

    <h2>新增會員</h2>
    <div style="color:red">*請設定您要註冊的帳號及密碼（最長12 個字元）</div>
    <form>
        <table>
            <tr>
                <td>Step1:登入帳號</td>
                <td><input type="text" name="acc" id="acc"></td>
            </tr>
            <tr>
                <td>Step2:登入密碼</td>
                <td><input type="password" name="" id="pw"></td>
            </tr>
            <tr>
                <td>Step3:再次確認密碼</td>
                <td><input type="password" name="pw2" id="pw2"></td>
            </tr>
            <tr>
                <td>Step4:信箱(忘記密碼時使用</td>
                <td><input type="text" name="" id="email"></td>
            </tr>
            <tr>
                <td>
                    <input type="button" value="註冊" onclick="reg()">
                    <input type="reset" value="清除">
                </td>
                <td></td>
            </tr>
        </table>
    </form>
</fieldset>
<script>
    function reg() {
        let acc = $("#acc").val();
        let pw = $("#pw").val();
        let pw2 = $("#pw2").val();
        let email = $("#email").val();
        if (acc == '' || pw == '' || pw2 == '' || email == '') {
            alert("不可空白");
        } else if (pw != pw2) {
            alert("密碼錯誤");
        } else {
            $.post("api/check.php?do=reg", {
                acc,
                pw,
                email
            }, function(r) {
                if (r == '1') {
                    alert("帳號重複");
                    location.reload();
                } else {
                    alert("註冊完成，歡迎加入");
                    location.reload();
                }
            })
        }
    }
</script>