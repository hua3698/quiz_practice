<div>目前位置：首頁 > 分類網誌 > <span id="fun">健康新知</span></div>
<div style="display: flex;width:80%; margin:5px auto;">
    <fieldset style="width: 20%;">
        <legend>分類網誌</legend>
        <div><a href="#" class="type" id="t1">健康新知</a></div>
        <div><a href="#" class="type" id="t2">菸害防治</a></div>
        <div><a href="#" class="type" id="t3">癌症防治</a></div>
        <div><a href="#" class="type" id="t4">慢性病防治</a></div>
    </fieldset>
    <fieldset style="width: 60%;">
        <legend>文章列表</legend>
        <div class="text"></div>
    </fieldset>
</div>

<script>
    getTitle(1);

$(".type").on("click",function(){
    let id=$(this).attr("id").replace("t","")
    let word=$(this).html()
    $("#fun").html(word)
    getTitle(id);
})

function getTitle(num){
$.get("api/f_po.php",{case:1,num},function(re){
    $(".text").html(re)
})
}

function getNews(id){
$.get("api/f_po.php",{case:2,id},function(re){
    $(".text").html(re)
})
}
</script>