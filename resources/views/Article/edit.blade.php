@extends('layouts.layout')
@section('content')
		<div>
		<form action='' method='post'>
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="id" value="{{ $id }}">
			<div><label>标题</label><input type='text' value='{{$result->title}}'></div>
			<div><label>板块</label>
				<select  name="sid">
				@foreach($arttype as $k=>$v)
                    <option {{$k==$result->sid?'selected':''}} value="{{$k}}">{{$v}}</option>
                @endforeach
				</select>
			</div>
			<div><textarea>{{$result->content}}</textarea></div>
			<div><input type='submit' value='修改'></div>
		</form>
		</div>
<script>

</script>
@stop