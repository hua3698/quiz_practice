<!--正中央-->
<script>
var lin = new Array();
<?php
$mvim=$Mvim->all(['sh'=>1]);
foreach($mvim as $m){
    echo "lin.push('{$m['img']}');";
}
?>
var now = 0;
if (lin.length > 1) {
    setInterval("ww()", 3000);
    now = 1;
}
function ww() {
    $("#mwww").html("<embed loop=true src='img/" + lin[now] + "' style='width:99%; height:100%;'></embed>")
    //$("#mwww").attr("src",lin[now])
    now++;
    if (now >= lin.length)
        now = 0;
}
</script>

<div style="width:100%; padding:2px; height:290px;">
    <div id="mwww" loop="true" style="width:100%; height:100%;">
        <div style="width:99%; height:100%; position:relative;" class="cent">
            <img src="img/<?=$mvim[0]['img'];?>" style="width:100%;height:100%">
        </div>
    </div>
</div>
<div
    style="width:95%; padding:2px; height:190px; margin-top:10px; padding:5px 10px 5px 10px; border:#0C3 dashed 3px; position:relative;">
    <span class="t botli">最新消息區 <span style="float: right;"><a href="?do=news"><?=($News->count(['sh'=>1])>5)?'More...':'';?></a></span></span>
    <ul class="ssaa" style="list-style-type:decimal;">
    <?php
    $news=$News->all(['sh'=>1],"limit 5");
    foreach($news as $n){
        ?>
        <li>
            <div><?=mb_substr($n['text'],0,10);?></div>
            <div class="all" style="display: none;"><?=$n['text'];?></div>
        </li>
        <?php
    }
    ?>
    </ul>
    <div id="altt"
        style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">
    </div>
    <script>
    $(".ssaa li").hover(
        function() {
            $("#altt").html("<pre>" + $(this).children(".all").html() + "</pre>")
            $("#altt").show()
        }
    )
    $(".ssaa li").mouseout(
        function() {
            $("#altt").hide()
        }
    )
    </script>
</div>