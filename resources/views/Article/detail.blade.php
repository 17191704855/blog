@extends('layouts.layout')
@section('content')
		<div>
			<h1>{{$result->title}}</h1>
			<span>{{$result->name}}</span>
			<span>{{date('Y-m-d h:i:s',$result->createtime)}}</span>
			<div><span>{{$result->content}}</span></div>
		</div>
		<div id='div'>
			@foreach($comment as $k=>$v)
			<div class='{{$v->id}}'>
			<span>{{$v->username}}：</span>&nbsp;<span>{{$v->comment}}</span>
			<span>{{date('Y-m-d h:i:s',$v->createtime)}}</span>
			<input type='text' class='{{$v->id}}text'><button   v-on:click="addreply({{$v->id}},{{$v->id}},{{$v->uid}},{{$v->username}})">回复</button>
			@if($v->uid==Session::get('userid'))
				<button   v-on:click="delComment({{$v->id}})">删除</button>
			@endif
				@foreach($v->secondcomment as $k=>$v2)
					<div class='{{$v2->id}}'>
					&nbsp;&nbsp;&nbsp;&nbsp;<span>{{$v2->username}}回复{{$v2->tousername}}:</span>&nbsp;<span>{{$v2->comment}}</span>
					<span>{{date('Y-m-d h:i:s',$v2->createtime)}}</span>
					<input type='text' class='{{$v2->id}}text'><button   v-on:click="addreply({{$v2->id}},{{$v->id}},{{$v2->uid}},{{$v2->username}})">回复</button>
					@if($v->uid==Session::get('userid'))
						<button   v-on:click="delComment({{$v2->id}})">删除</button>
					@endif
					</div>
				@endforeach
			</div>
			@endforeach
		</div>
		<div id='div'>
		<form action="/comment/addcomment" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="aid" value="{{$id}}">
			<textarea name='comment'></textarea>
			<input type='submit' value='评论'>
		</div>
<script>
window.onload=function(){
		new Vue({
			el:'#div',
			methods:{
				delComment(id){
					axios.get('/comment/delComment',{
						params:{
							id:id
						}
					})
					.then(resp => {
						document.getElementsByClassName(id)[0].style.display='none'
					}).catch(err => {             //
						console.log('请求失败：'+err.status+','+err.message);
					});
				},
				addreply(id,pid,uid,username){
					console.log(username);
					axios.get('/comment/addreply',{
						params:{
							aid:{{$id}},
							id:id,
							pid:pid,
							uid:uid,
							username:username,
							comment:document.getElementsByClassName(id+'text')[0].value,
						}
					})
					.then(resp => {
						location.reload();
					}).catch(err => {             //
						console.log('请求失败：'+err.status+','+err.message);
					});
				},
			}
		});
	}
</script>
@stop