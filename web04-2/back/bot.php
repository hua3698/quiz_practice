<?php
if(isset($_POST)){
    $_POST['id']=1;
    $Bottom->save($_POST);
}
?>
<h1 class="ct">編輯頁尾版權區</h1>
<form action="?do=bot" method="post">
    <table class="all">
        <?php
        $a = $Bottom->find(1);
        ?>
        <tr>
            <td class="tt ct">葉偉宣告內容</td>
            <td class="pp"><input style="width: 90%;" type="text" name="bottom" id="bot" value="<?= $a['bottom']; ?>"></td>
        </tr>
    </table>
    <div class="ct"><input type="submit" value="編輯"><input type="button" value="重置" onclick="javascript:$('#bot').val('')"></div>
</form>