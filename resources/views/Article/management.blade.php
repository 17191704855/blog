@extends('layouts.layout')
@section('content')
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
@stop