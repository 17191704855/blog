<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
		<script src="{{ asset('js/vue.js') }}"></script>
        <title>论坛主页</title>
    </head>
<body>
		<div>
			<h1>{{$result->title}}</h1>
			<span>{{$result->name}}</span>
			<span>{{date('Y-m-d h:i:s',$result->createtime)}}</span>
			<div><span>{{$result->content}}</span></div>
		</div>
</body>
</html>
<script>

</script>
