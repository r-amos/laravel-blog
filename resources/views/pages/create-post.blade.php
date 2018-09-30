@extends('templates.layout')
@section('content')
<div class="create">
    <div class="title">
        <h1> Add New Post </h1>
    </div>
    <div class="create-content">
    <form method="POST" action="/posts">
            @csrf
            <div>
                <label for="title">Title:</label>
                <input id="title" name="blog-title" type="text" />
            </div>
            <div>
                <label>Topic</label>
                <div id="js-topics">
                    <select id="js-topic-dropdown" name="topics[0]">
                        @foreach($tags as $tag)
                        <option value="{{ $tag }}">{{ $tag }}</option>
                        @endforeach
                    </select>
                </div>
                <button id="js-topic-button" class="create-topic__button">
                    Add Topic
                </button>
            </div>
            <div>
                <label for="description">Description:</label>
                <textarea id="description" name="blog-description" type="text"></textarea>
            </div>
            <div>
                <label for="content">Content:</label> 
                <textarea id="content" name="blog-content" type="text"></textarea>
            </div>
            <div>
                <button type="submit">Save Post!</button>
            </div>
        </form>
    </div>
</div>
@endsection