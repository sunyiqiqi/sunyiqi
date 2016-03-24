<form method="post" action="/xiu">
	<input type="hidden" name="l_id" value="{{$arr->l_id}}">
	<textarea name="contents" rows="10" cols="20">{{$arr->l_contents}}</textarea>
	<input type="submit" value="提交">
</form>