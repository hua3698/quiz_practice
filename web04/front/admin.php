<table class="all">
	<tr>
		<td class="tt ct">帳號</td>
		<td class="pp"><input type="text" name="acc" id="acc"></td>
	</tr>
	<tr>
		<td class="tt ct">密碼</td>
		<td class="pp"><input type="password" name="pw" id="pw"></td>
	</tr>
	<tr>
		<td class="tt ct">驗證碼</td>
		<td class="pp"><span id="code"></span><input type="text" name="" id="ans"></td>
	</tr>
	<tr>
		<td class="ct" colspan="2"><input id="b" type="button" value="確認"></td>
	</tr>
</table>

<script>
	code();
	function code(){
		let a=Math.floor(Math.random()*90)+10, b=Math.floor(Math.random()*90)+10;
		let que=a+b;
		$("#code").html(`${a}+${b}=`);
		ver(que)
	}
	function ver(que){
		$("#b").on("click",function(){
			let acc=$("#acc").val(), pw=$("#pw").val();
			let ans=$("#ans").val();
			$.post("api/login.php",{acc,pw,que,ans},function(re){
				switch(re){
					case '1':
						alert("對不起，您輸入的驗證碼有誤請您重新登入");
						location.reload();
					break;
					case '2':
						location.href="backend.php";
						break;
					case '3':
						alert("帳號或密碼錯誤");
					break;
				}
			})
		})
	}
</script>
