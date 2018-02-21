@extends('theme.layouts.layout')
@section('title')
	Danh sách bộ phận IT
@endsection
@section('content')
	<ul>
		@foreach ($listParts as $lp)
			<li><a href="{{ route('list-team-in-part', ['slug'=>$lp->slug]) }}" title="">{{$lp->name}}</a></li>
		@endforeach
	</ul>
@endsection