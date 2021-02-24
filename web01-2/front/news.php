<h3>更多最新消息顯示區</h3>
<hr>
<ul style="list-style-type:none;">
    <?php
    $per = 5;
    $pages = ceil($News->count() / $per);
    $now = (isset($_GET['p'])) ? $_GET['p'] : 1;
    $start = ($now - 1) * $per;
    $news = $News->all(['sh' => 1],"limit $start,$per");
    foreach ($news as $key=> $n) {
    ?>
        <li class="sswww">
            <div><?=$key+$start+1;?>. <?= mb_substr($n['text'], 0, 10); ?></div>
            <div class="all" style="display: none;"><?= $n['text']; ?></div>
        </li>
    <?php
    }
    ?>
</ul>
<div style="text-align:center;">
<?php
                if($now>1){
                    ?>
                    <a class="bl" style="font-size:30px;" href="?do=news&p=<?=($now-1);?>">&lt;&nbsp;</a>
                    <?php
                }
                for($i=1;$i<=$pages;$i++){
                    $font=($i==$now)?'2rem':'1rem';
                    ?>
                    <a href="?do=news&p=<?=$i;?>" style="padding:5px;font-size:<?=$font;?>"><?=$i;?></a>
                    <?php
                }
                if($now<$pages){
                    ?>
                    <a class="bl" style="font-size:30px;" href="?do=news&p=<?=($now+1);?>">&nbsp;&gt;</a>
                    <?php
                }
            ?>
</div>
<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 0px; left: 200px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">
</div>
<script>
    $(".sswww").hover(
        function() {
            $("#alt").html("" + $(this).children(".all").html() + "").css({
                "top": $(this).offset().top - 50
            })
            $("#alt").show()
        }
    )
    $(".sswww").mouseout(
        function() {
            $("#alt").hide()
        }
    )
</script>