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
		<div>登录名:<input type='text' name='login_name' value=''></div>
		<div>密码:<input type='password' name='pwd' value=''></div>
		<div>重复密码:<input type='password' name='repwd' value=''></div>
		<div>用户名:<input type='text' name='name' value=''></div>
		<div>邮箱:<input type='text' name='email' value=''></div>
		<div>手机号:<input type='text' name='phone' value=''></div>
		<div><input type='submit' value='注册'></div>
		<div>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	</form>
</body>
</html>
<script>
var vm = new Vue({
	el:'#ww',
data: {
	msg:'111',
  isActive: true,
  error: null
},
computed: {
  classObject: function () {
    return {
      active: this.isActive && !this.error,
      'text-danger': this.error && this.error.type === 'fatal'
    }
  }
}
})
</script>
