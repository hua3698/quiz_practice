<fieldset >
    <legend>目前位置：首頁 > 人氣文章區</legend>
    <table width="100%" style="margin: auto;">
        <tr>
            <th width="30%">標題</th>
            <th width="40%">內容</th>
            <th width="15%">人氣</th>
            <th width="10%"></th>
        </tr>
        <?php
            $per=5;
            $pages=ceil($News->count()/$per);
            $now=(isset($_GET['p']))?$_GET['p']:1;
            $start=($now-1)*$per;
            $news=$News->all(['sh'=>1],"order by `good` desc limit $start,$per");
            foreach($news as $key=> $n){
            ?>
            <tr>
                <td class="toggle" style="background: #eee;"><?=$n['title'];?></td>
                
                <td>
                    <span><?=mb_substr($n['text'],0,10);?></span>
                    <span style="display: none;" class="alerr">
                    <h3><?=$n['title'];?></h3>
                    <pre><?=$n['text'];?></pre>
                    </span>
                </td>
                <td><?=$n['good'];?>個人說
                <img src="img/02B03.jpg" style="width:25px">
                </td>
                <td>
                    <?php
                    if(!empty($_SESSION['login'])){
                        $chk=$Log->count(['acc'=>$_SESSION['login'],'news'=>$n['id']]);
                        if($chk) echo "<a href='#' onclick='gd(this)' id='{$n['id']}'>收回讚</a>";
                        else echo "<a href='#' onclick='gd(this)' id='{$n['id']}'>讚</a>";
                    }
                    ?>
                </td>
            </tr>
            <?php
        }
    ?>
    </table>
    <div class="ct">
            <?php
            if($now>1){
                echo "<a href='?do=pop&p=".($now-1)."'><</a>";
            }
            for($i=1;$i<=$pages;$i++){
                $font=($i==$now)?'2rem':'1rem';
                echo "<a href='?do=pop&p=$i' style='font-size:$font'>$i</a>";
            }
            if($now<$pages){
                echo "<a href='?do=pop&p=".($now+1)."'>></a>";
            }
            ?>
        </div>
</fieldset>

<script>
$(".toggle").hover(function(){
$(this).next().children(".alerr").toggle()
})

function gd(n){
    let word=$(n).text();
    let id=$(n).attr("id")
    if(word=='讚') $(n).html("收回讚")
    else $(n).html("讚")
    $.post("api/good.php",{id},function(){
        location.reload()
    })
}
</script>