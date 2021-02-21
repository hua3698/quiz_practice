<div style="height:32px; display:block;">
    <marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
        <?php
$m=$Ad->all(['sh'=>1]);
foreach($m as $m){
    echo $m['id'].".";
    echo $m['text'];
}
?>
    </marquee>
</div>
<div style="text-align:center;">
    <span class="t botli">更多最新消息顯示區</span>
    <ul class="ssaa" style="list-style-type:none;">
        <?php
        $per=5;
        $pages=ceil($News->count()/$per);
        $now=(isset($_GET['p']))?$_GET['p']:1;
        $start=($now-1)*$per;
        $news=$News->all(['sh'=>1]," limit $start,$per");
        foreach($news as $key=> $t){
            echo "<li style='text-align:start'>".($start+$key+1).". ".mb_substr($t['text'],0,10)."<div class='all' style='display:none'>{$t['text']}</div></li>";
        }
    ?>
    </ul>
    <div class="cent">
        <?php
            if($now>1){
                echo "<a class='bl' style='font-size:30px;' href='?do=news&p=".($now-1)."'>&lt;&nbsp;</a>";
            }
            for($i=1;$i<=$pages;$i++){
                $font=($now==$i)?'2rem':'1rem';
                echo "<a href='?do=news&p=".$i."' style='font-size: $font;'>".$i."</a>";
            }
            if($now<$pages){
                echo "<a class='bl' style='font-size:30px;' href='?do=news&p=".($now+1)."'>&nbsp;&gt;</a>";
            }
        ?>
        </div>
</div>
<div id="alt"
    style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">
</div>
<script>
        $(".ssaa li").hover(
            function() {
                $("#alt").html("<pre>" + $(this).children(".all").html() + "</pre>")
                $("#alt").show()
            }
        )
        $(".ssaa li").mouseout(
            function() {
                $("#alt").hide()
            }
        )
    </script>