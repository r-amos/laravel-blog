@extends('templates.layout')
@section('title')
@section('content')
    <div class="index index__heading-container">
        <!--<h1><span class="heading--break">Robert</span> Amos.</h1>->
        <!--<h3>Dreamweaver. Visionary. Idiot.</h3>-->
        <p>
            Hi, I'm <span class="index index__name">Rob Amos</span> a junior <strong>web developer</strong> based in the South West. 
            I created this site to document anything that I learn, or find interesting.
        </p>
    </div>
    <div class="index index__posts">
        <h2> Lastest Rambles...</h2>
         @foreach($posts as $post)
            <div class="posts__post">
                <h4>
                    <a class="posts__post-link" href="/posts/{{ urlencode($post['slug']) }}">{{ $post['title'] }}</a>
                </h4>
                <div class="sub-heading">
                    {{$post->formattedDate()}}
                </div>
                @include('components.tags', ['tags' => $post->tags])
                <p>{{ $post['description'] }}</p>
            </div>
        @endforeach
    </div>
@endsection