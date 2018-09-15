@extends('templates.layout')

@section('content')
    <h1>Some Stuff</h1>
    @foreach($posts as $post)
    <h3>{{ $post['title'] }}</h3>
    @endforeach
    {{ $posts->links('components.pagination', ['paginator' => $posts]) }}
@endsection