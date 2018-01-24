<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
		<script src="{{ asset('js/vue.js') }}"></script>
		<script src="https://cdn.bootcss.com/axios/0.16.0/axios.min.js"></script>
        <title>论坛主页</title>
    </head>
<body id="body">
<div id="div">
	@foreach($list as $k=>$v)
		<div class='itany {{$v->id}}'>
		<a href='/article/detail?id={{$v->id}}'>{{$v->title}}</a>
		<span>{{$v->name}}</span>&nbsp;<span>{{$arttype[$v->sid]}}</span>
		<span>{{date('Y-m-d h:i:s',$v->createtime)}}</span>
		<a href='/article/edit?id={{$v->id}}'>编辑</a>
		<button   v-on:click="delArticle({{$v->id}})">删除</button>
		</div>
	@endforeach
	<div >	{{$list->render()}}   </div>
	</div>
</body>
</html>
<script>
	window.onload=function(){
		new Vue({
			el:'#div',
			methods:{
				delArticle(id){
					axios.get('/article/delArticle',{
						params:{
							id:id
						}
					})
					.then(resp => {
						this.data=resp;
						document.getElementsByClassName(id)[0].style.display='none'
					}).catch(err => {             //
						console.log('请求失败：'+err.status+','+err.message);
					});
				},
			}
		});
	}
</script>
