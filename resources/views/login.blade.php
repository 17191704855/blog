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
		用户:<input type='text' name='username' value=''>
		密码:<input type='password' name='pwd' value=''>
		<input type='submit' value='提交'>
		<a href='/regist'>注册</a>
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
