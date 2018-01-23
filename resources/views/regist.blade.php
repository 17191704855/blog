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
		登录名:<input type='text' name='login_name' value=''>
		密码:<input type='password' name='pwd' value=''>
		重复密码:<input type='password' name='pwd' value=''>
		用户名:<input type='text' name='name' value=''>
		邮箱:<input type='text' name='email' value=''>
		手机号:<input type='text' name='phone' value=''>
		<input type='submit' value='注册'>
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
