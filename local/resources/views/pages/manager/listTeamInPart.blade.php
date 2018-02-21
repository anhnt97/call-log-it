@extends('theme.layouts.layout')
@section('title')
	Danh sách nhóm của {{$part->name}}
@endsection
@section('content')
	<ul>
		@foreach ($listTeams as $lt)
			<li><a href="{{ route('list-user-in-team', ['slugPart'=> $part->slug,'slugTeam'=>$lt->slug]) }}">{{$lt->name}}</a></li>
		@endforeach
	</ul>
@endsection