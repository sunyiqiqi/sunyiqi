<?php
use yii\widgets\LinkPager;
?>
<script type="text/javascript" src="<?php echo Yii::$app->request->Baseurl?>/assets/js/jquery.js"></script>

<textarea name="contents" id="contents" rows="10" cols="20"></textarea>
<br>
<input type="button" value="提交" id="butt">
<div id="contents">
<table>
<tr>
	<td>内容</td>
	<td>删除</td>
	<td>修改</td>
</tr>
<?php foreach($models as $val):?>
<tr>
<input type="hidden" id="u_id" value="<?php echo $val['u_id']?>">
	<td><?php echo $val['l_contents']?>
	<a href="<?php echo Yii::$app->urlManager->createUrl(["welcome/del"])?>&l_id=<?php echo $val['l_id']?>">删除</a><a href="<?php echo Yii::$app->urlManager->createUrl(['welcome/upda'])?>&l_id=<?php echo $val['l_id']?>">修改</a>
	</td>
</tr>
<?php endforeach;?>
</table>

<?php 
echo LinkPager::widget([
    'pagination' => $pages,
]);

?>
</div>
<script type="text/javascript">
$(document).on("click","#butt",function(){
	var u_id=$("#u_id").val();
	var liuyan=$("#contents").val();
	//alert("12");
	$.ajax({
		type:"get",
		url:"<?php echo Yii::$app->urlManager->createUrl(['welcome/adds'])?>",
		data:{"liuyan":liuyan,"u_id":u_id},
		success:function(data){
			//alert(data);
			$("#contents").html(data);
		}
	})
})

</script>
