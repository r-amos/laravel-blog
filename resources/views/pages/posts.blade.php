@extends('templates.layout')
@section('content')
    <div class="title">
        <h1>{{ isset($tag) ? $tag : '' }} Mumblings.</h1>
        <div class="sub-heading">Me, writing shit on topics I know little. These include but are not limited to JavaScript, CSS, React, PHP. Anything.</div>
    </div>
    @foreach($posts as $post)
            <div class="posts__post">
                <h2>
                    <a href="/posts/{{ urlencode($post['slug']) }}">{{ $post['title'] }}</a>
                </h2>
                <div class="sub-heading">
                    {{$post->formattedDate()}}
                </div>
                @include('components.topics')
                <p>{{ $post['description'] }}</p>
                @include('components.edit')
            </div>
    @endforeach
    {{ $posts->links('components.pagination', ['paginator' => $posts]) }}
@endsection