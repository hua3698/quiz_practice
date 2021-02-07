<fieldset>
    <legend>新增問卷</legend>
    <form action="api/b_que.php" method="post">
        <table>
            <tr>
                <td>問卷名稱<input type="text" name="title" id=""></td>
            </tr>
            <tr id="op">
                <td>選項<input type="text" name="option[]" id=""><button type="button" onclick="more()">更多</button></td>
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
        <tr>
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
                <td><?php
                    if ($q['sh'] == 1) {
                        echo "<button onclick='op(this)' class='{$q['id']}'>開放</button>";
                    } else {
                        echo "<button onclick='op(this)' class='{$q['id']}'>關閉</button>";
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
        $("#op").after(`
        <tr>
            <td>選項<input type="text" name="option[]" id=""></td>
        </tr>
        `)
    }

    function op(t) {
        let word=$(t).html();
        let id=$(t).attr("class");
        if(word=='開放') $(t).html("關閉")
        else $(t).html("開放");
        $.get("api/op.php",{id},function(){
            location.reload();
        })
    }
</script>