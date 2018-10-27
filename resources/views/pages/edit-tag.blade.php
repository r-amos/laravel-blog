@extends('templates.layout')
@section('content')
<div class="tag-content">
    <div class="title">
        <h1> Edit Tag: <em>{{ $tag->name }}</em></h1>
    </div>
    <form action="/tags/{{ $tag->name }}" method="POST" >
        @method('PUT')
        @csrf
        <input value="{{$tag->name}}" name="name" class="tag__input" />
        <input type="submit" class="button button--edit" value="Save">
    </form>
</div>
@endsection