<div>目前位置：首頁 > 分類網誌 > <span id="fun">健康心知</span></div>
<div style="margin:30px auto;width: 80%;display:flex;">
    <fieldset style="width: 20%; display:inline-block;">
        <legend>分類網誌</legend>
        <div><a href="#" id="t1" class="ti">健康新知</a></div>
        <div><a href="#" id="t2" class="ti">菸害防治</a></div>
        <div><a href="#" id="t3" class="ti">癌症防治</a></div>
        <div><a href="#" id="t4" class="ti">慢性病防治</a></div>
    </fieldset>
    <fieldset style="width: 60%; display:inline-block;">
        <legend>文章列表</legend>
        <div id="bo"></div>
    </fieldset>
</div>

<script>
    newarti(1);
    $(".ti").on("click", function() {
        let word = $(this).html();
        let id = $(this).attr("id").replace("t","");
        $("#fun").html(word);
        newarti(id);
    })

    function newarti(id) {
        $.post("api/f_po.php?do=title",{id},function(re){
            $("#bo").html(re);
        })
    }
    function newcon(id) {
        $.post("api/f_po.php?do=content",{id},function(re){
            $("#bo").html(re);
        })
    }
</script>