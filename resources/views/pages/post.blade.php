@extends('templates.layout')
@section('content')
    <div class="title">
        <h3>{{$post->title}}</h3>
    </div>
    <div class="content">
        {!! $post->content !!}
    </div>

@endsection