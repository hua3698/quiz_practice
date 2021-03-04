<form>
    <table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp"><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp"><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="tt ct">驗證碼</td>
            <td class="pp">
                <span id=q></span>
                <input type="text" name="" id="ans">
            </td>
        </tr>
    </table>
    <div class="ct"><input type="button" value="確認"></div>
</form>

<script>
    que()

    function que() {
        let a = Math.ceil(Math.random() * 89) + 10;
        let b = Math.ceil(Math.random() * 89) + 10;
        let que = a + b;
        $("#q").html(`${a}+${b}=`);
        login(que)
    }

    function login(que) {
        $(".ct input").on("click", function() {
            let acc = $("#acc").val();
            let pw = $("#pw").val();
            let ans = $("#ans").val();
            $.post("api/login.php?do=admin", {acc,pw,que,ans}, function(r) {
                switch (r) {
                    case '1':
                        alert("對不起，您輸入的驗證碼有誤請您重新登入");
                        // location.reload();
                        break;
                    case '2':
                        lof("backend.php");
                        break;
                    case '3':
                        alert("帳號或密碼錯誤");
                        location.reload();
                        break;
                }
            })
        })
    }
</script>