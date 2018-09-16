@extends('templates.layout')

@section('content')
    <div class="title">
        <h2>Ramblings.</h2>
    </div>
    @foreach($posts as $post)
        <div class="posts posts__container">
            <h4>
                <a href="/posts/{{ $post['slug'] }}">{{ $post['title'] }}</a>
            </h4>
            <div>{{$post['created_at']}}</div>
            <div>
                @foreach($post['tags'] as $tag)
                    <span>{{ $tag['name'] }}</span>
                @endforeach
            </div>
            <p>{{ $post['description'] }}</p>
        </div>
    @endforeach
    {{ $posts->links('components.pagination', ['paginator' => $posts]) }}
@endsection