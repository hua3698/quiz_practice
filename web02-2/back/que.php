<fieldset>
    <legend>新增問卷</legend>
    <form action="api/b_que.php" method="POST">
        <table>
            <tr>
                <td>問卷名稱</td>
                <td><input type="text" name="title" id=""></td>
            </tr>
            <tr style="background:#eee" id="add">
                <td colspan="2">選項<input type="text" name="option[]" id=""><button type="button" onclick="more()">更多</button></td>
            </tr>
            <tr>
                <td><input type="submit" value="新增"><input type="reset" value="清空"></td>
            </tr>
        </table>
    </form>
</fieldset>

<fieldset>
    <legend>問卷列表</legend>
    <table>
        <tr style="background:#eee" id="add">
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
                        <button type="button" onclick="que()" class="<?=$q['id'];?>">開放</button>
                    <?php
                    } else {
                    ?>
                        <button type="button" onclick="que()" class="<?=$q['id'];?>">隱藏</button
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

    function que() {
        // let word=$(this).html()
        console.log($(this))
        if (word == "開放") $(this).html("---")
        else $(word).html("開放")
        // $.get("api/good.php", {id})

    }
</script>