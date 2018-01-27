<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
		<script src="{{ asset('js/vue.js') }}"></script>
        <title>Laravel</title>
    </head>
<body>
	<form action='' method='post'>
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div>用户:<input type='text' name='username' value=''></div>
		<div>密码:<input type='password' name='pwd' value=''></div>
		<div><input type='submit' value='提交'>
		<a href='/regist'>注册{{ $error }}</a></div>
	</form>
</body>
</html>
<script>

</script>
