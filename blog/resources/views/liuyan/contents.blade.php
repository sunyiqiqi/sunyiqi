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

