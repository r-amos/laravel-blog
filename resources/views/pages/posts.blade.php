@extends('templates.layout')
@section('title', 'Ramblings')
@section('description', 'The varied ramblings of Robert Amos, Web Developer based in the South West')
@section('sidepanel', true)
@section('content')
    <div class="title">
        <h1>{{ isset($tag) ? $tag : '' }} Ramblings.</h1>
        <div class="sub-heading">Collection of ramblings on topics of which I know little.</div>
       @include('components.create')
    </div>
    @foreach($posts as $post)
            <div class="posts__post">
                <h2>
                    <a class="posts__post-link" href="/posts/{{ urlencode($post['slug']) }}">{{ $post['title'] }}</a>
                </h2>
                <div class="sub-heading">
                    {{$post->formattedDate()}}
                </div>
                @include('components.tags')
                <p>{{ $post['description'] }}</p>
                @include('components.edit')
            </div>
    @endforeach
    {{ $posts->links('components.pagination', ['paginator' => $posts]) }}
@endsection