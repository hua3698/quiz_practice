<?php
if(!empty($_POST)){
    $Bottom->save(['bottom'=>$_POST['text'],'id'=>1]);
}
?>
<h1 class="ct">編輯頁尾版權區</h1>
<form action="?do=bot" method="post">
    <table class="all ct">
        <tr>
            <td class="tt">頁尾宣告內容</td>
            <td class="pp"><input style="width: 95%;" type="text" id="bot" name="text" value="<?= $Bottom->find(1)['bottom']; ?>"></td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="編輯"><input type="button" value="重置" onclick="javascript:$('#bot').val('')">
    </div>
</form>