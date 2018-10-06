@extends('templates.layout')
@section('content')
    <div class="title">
        <h1> Edit: {{ $post->title }} </h1>
    </div>
    <div class="post-content">    
        <form method="POST" action="/posts/{{ $post->slug }}/update">
            @method('PUT')
            @csrf
            <div>
                <label for="title">Title:</label>
                <input id="title" name="blog-title" type="text" value="{{ $post->title }}" />
            </div>
            <div>
                 <label>Topic</label>
                <select name="blog-topic">
  

                    @foreach($tags as $tag)
                        <option value="{{ $tag }}">{{ $tag }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="description">Description:</label>
                <textarea id="description" name="blog-description" type="text">
                    {{ $post->description }}
                </textarea>
            </div>
            <div>
                <label for="content">Content:</label> 
                <textarea id="content" name="blog-content" type="text">
                    {{ $post->content }}
                </textarea>
            </div>
            <div>
                <button type="submit">Update Post!</button>
            </div>
        </form>
    </div>
@endsection