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
                 <label>Topics</label>
                 <div id="js-topics">
                    @forEach($post->tags as $selectedTag)
                        <select id="js-topic-dropdown" name="topics[{{$loop->index}}]">
                            @foreach($tags as $tag)
                                <option 
                                    @if($tag === $selectedTag->name) 
                                        selected
                                    @endif
                                    value="{{ $tag }}">{{ $tag }}
                                 </option>
                            @endforeach
                        </select>
                    @endforeach
                 </div>
                <button id="js-topic-button" class="create-topic__button">
                    Add Topic
                </button>
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