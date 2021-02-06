<fieldset>
    <legend>新增問卷</legend>
    <form action="api/b_que.php" method="POST">
        <table>
            <tr>
                <td>問卷名稱<input type="text" name="title" id=""></td>
            </tr>
            <tr id="add" style="background-color: #eee;">
                <td>選項<input type="text" name="option[]" id=""><input type="button" value="更多" onclick="more()"></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="新增">
                    <input type="reset" value="清空">
                </td>
            </tr>
        </table>
    </form>
</fieldset>

<fieldset>
    <legend>問卷列表</legend>
    <table>
        <tr style="background:#eee">
            <td>問卷名稱</td>
            <td>投票數</td>
            <td>開放</td>
        </tr>
        <?php
        $que = $Que->all(['subject' => 0]);
        foreach ($que as $q) {
        ?>
            <tr>
                <td><?= $q['que']; ?></td>
                <td><?= $q['count']; ?></td>
                <td>
                    <?php
                    if ($q['sh'] == 1) {
                    ?>
                        <button type="button" class="open" id="<?= $q['id']; ?>">開放</button>
                    <?php
                    } else {
                    ?>
                        <button type="button" class="open" id="<?= $q['id']; ?>">關閉</button>
                    <?php
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</fieldset>

<script>
    function more() {
        $("#add").after(`
        <tr style="background:#eee">
                <td colspan="2">選項<input type="text" name="option[]" id=""></td>
            </tr>
        `)
    }

    $(".open").on("click", function() {
        let word = $(this).html()
        let id=$(this).attr("id");
        if (word == '開放') $(this).html("關閉")
        else $(this).html("開放")
        // console.log(id)
        $.get("api/b_que.php", {id},function(re){
            console.log(re)
        })
    })
</script>