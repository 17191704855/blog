<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
		<script src="{{ asset('js/vue.js') }}"></script>
        <title>论坛主页</title>
    </head>
<body>
<?php echo $errors->first('id'); ?>
	<ul >
		<li><a href='/article/publish'>发表帖子</a></li>
		<li><a href='/article/management'>我的帖子</a></li>
	</ul>
	@foreach($list as $k=>$v)
		<div>
		<a href='/article/detail?id={{$v->id}}'>{{$v->title}}</a>
		<span>{{$v->name}}</span>&nbsp;<span>{{$arttype[$v->sid]}}</span>
		<span>{{date('Y-m-d h:i:s',$v->createtime)}}</span>
		</div>
	@endforeach
	<div >	{{$list->render()}}   </div>
</body>
</html>
<script>

</script>
