@extends('templates.layout')

@section('content')
    <h2> Add New Post </h2>
    <form method="POST" action="/posts">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input id="title" name="blog-title" type="text" />
        </div>
        <div>
            <label for="description">Description:</label>
            <input id="description" name="blog-description" type="text" />
        </div>
        <div>
            <label for="content">Content:</label> 
            <textarea id="content" name="blog-content" type="text">
            </textarea>
        </div>
        <div>
            <button type="submit">Save Post</button>
        </div>
    </form>
@endsection