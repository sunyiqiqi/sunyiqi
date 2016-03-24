<meta charset='utf-8'>
<textarea name="liuyan" id="liuyan" rows="10" cols="20">
</textarea><br>
<input type="hidden" name="u_id" id="u_id" value="1">
<input type="button" value="留言" id="butt">
<div id="contents">
<table>
<tr>
	<td>contents</td>
	<td>修改</td>
	<td>删除</td>
</tr>
  @foreach ($arr as $val)
<tr>
	<td><?php echo $val->l_contents?>
	<a href="javascript:void(0)" class="del" value="
	{{ $val->l_id }}">删除</a>
	<a href="javascript:void(0)" class="upda" value="
	{{$val->l_id }}">修改</a></td>
</tr>
 @endforeach
</table>
<?php // echo $pages;?>
</div>
{!! $arr->links() !!}
<script src="jquery.js"></script>
<script>
var u_id=$("#u_id").val();
$(document).on("click","#butt",function(){
	
	var liuyan=$("#liuyan").val();
	$.ajax({
		type:"post",
		url:"/content",
		data:"liuyan="+liuyan+"&u_id="+u_id,
		success:function(data){
			$("#contents").html(data);
		}
	})
})
//原生
/*function ajaxzeal(p){
		$.ajax({
			type:"get",
			url:"/liuyan",
			data:"p="+p,
				success:function(dat){
				$("#contents").html(dat);
			}
		})
	}*/
//删除
$(document).on("click",".del",function(){
	var l_id=$(this).attr("value");
	$(this).parent().parent().remove();
	$.ajax({
		type:"get",
		url:"/del",
		data:"l_id="+l_id,
		success:function(text){
			if(text==1){
				alert("删除成功");
			}else{
				alert(0);
			}
		}
	})
})
//修改
	$(document).on("click",".upda",function(){
		var l_id=$(this).attr("value");
		location.href="/upda?l_id="+l_id;

	})
</script>
