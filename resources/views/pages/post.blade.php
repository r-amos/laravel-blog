@extends('templates.layout')
@section('content')
    <div class="title">
        <h1>{{$post->title}}</h2>
         <div class="sub-heading">
            {{$post->formattedDate()}}
         </div>
         @include('components.edit')
    </div>
    <div class="content">
        <p class="summary">
            {{ $post->description }}
        </p>
        {!! $post->content !!}
    </div>
@endsection