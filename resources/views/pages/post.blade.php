@extends('templates.layout')
@section('content')

<h1>{{$post->title}}</h1>
<p>{!! $post->content !!}</h1>

@endsection