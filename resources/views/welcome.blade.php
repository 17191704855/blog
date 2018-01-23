<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
		<script src="{{ asset('js/vue.js') }}"></script>
        <title>Laravel</title>
    </head>
<body>
	
	
<div id='ww' v-bind:class="classObject"> @{{ msg }}</div>

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
