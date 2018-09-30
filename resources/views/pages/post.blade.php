@extends('templates.layout')
@section('content')
<div class="post">
        <div class="title">
            <h1>{{$post->title}}</h2>
            <div class="sub-heading">
                {{$post->formattedDate()}}
            </div>
            @include('components.topics')
        </div>
        <div class="post-content">
            <p class="summary">
                {{ $post->description }}
            </p>
            {!! $post->content !!}
            @include('components.edit')
        </div>
</div>
@endsection