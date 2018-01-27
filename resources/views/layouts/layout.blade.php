<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
		<script src="{{ asset('js/vue.js') }}"></script>
		<script  src="https://cdn.bootcss.com/axios/0.16.0/axios.min.js"></script>
        <title>@yield('title','论坛主页')</title>
    </head>
<body>
	<div><ul >
		@section('header')
			<li><a href='/article/publish'>发表帖子</a></li>
			<li><a href='/article/management'>我的帖子</a></li>
		@show
	</ul>
	
	</div>
	<div class='content'>
		@yield('content')
	</div>
	<div class='tail'>
		@section('tail')
		尾部
		@show
	</div>
</body>
</html>
<script>

</script>
