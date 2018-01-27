@extends('layouts.layout')
@section('content')
	@foreach($list as $k=>$v)
		<div>
		<a href='/article/detail?id={{$v->id}}'>{{$v->title}}</a>
		<span>{{$v->name}}</span>&nbsp;<span>{{$arttype[$v->sid]}}</span>
		<span>{{date('Y-m-d h:i:s',$v->createtime)}}</span>
		</div>
	@endforeach
	<div >	{{$list->render()}}   </div>
<script>

</script>
@stop
