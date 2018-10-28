@extends('templates.layout')
@section('title', 'Edit Post')
@section('content')
    <div class="title">
        <h1> Edit: {{ $post->title }} </h1>
    </div>
    <div class="post-content">    
        <form method="POST" action="/posts/{{ $post->slug }}">
            @method('PUT')
            @csrf
            <div>
                <label for="title">Title:</label>
                <input id="title" name="blog-title" type="text" value="{{ $post->title }}" />
            </div>
            <div>
                 <label>Tags</label>
                 <div class="tags" id="js-tags">
                    @forEach($post->tags as $selectedTag)
                        <select class="tags__select" id="js-tag-dropdown" name="tags[{{$loop->index}}]">
                            @foreach($tags as $tag)
                                <option 
                                    @if($tag === $selectedTag->name) 
                                        selected
                                    @endif
                                    value="{{ $tag }}">{{ $tag }}
                                 </option>
                            @endforeach
                        </select>
                        <button id="js-delete-tag" class="button button--delete tags__button">Delete</button>
                    @endforeach
                 </div>
                <button id="js-tag-button" class="create-tag__button button button--update">
                    Add Tag
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