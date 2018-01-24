<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
		<script src="{{ asset('js/vue.js') }}"></script>
        <title>论坛主页</title>
    </head>
<body>
		<div>
			<form action='' method='post'>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div><lable>文章标题：</lable><input type='text' name='title'></div>
				<div><lable>文章类型：</lable>
					<select  name="sid">
						@foreach($arttype as $k=>$v)
                            <option value="{{$k}}">{{$v}}</option>
                        @endforeach
                    </select>
				<div><lable>文章内容：</lable><textarea name='content'></textarea></div>
				<div><input type='submit' value='发表'></div>
			</form>
		</div>
</body>
</html>
<script>

</script>
