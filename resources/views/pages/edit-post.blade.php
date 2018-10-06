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
                 <div class="topics" id="js-topics">
                    @forEach($post->tags as $selectedTag)
                        <select class="topics__select" id="js-topic-dropdown" name="topics[{{$loop->index}}]">
                            @foreach($tags as $tag)
                                <option 
                                    @if($tag === $selectedTag->name) 
                                        selected
                                    @endif
                                    value="{{ $tag }}">{{ $tag }}
                                 </option>
                            @endforeach
                        </select>
                        <button id="js-delete-tag" class="button button--delete topics__button">Delete</button>
                    @endforeach
                 </div>
                <button id="js-topic-button" class="create-topic__button button button--update">
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
                <button class="button button--update" type="submit">Update Post!</button>
            </div>
        </form>
    </div>
@endsection