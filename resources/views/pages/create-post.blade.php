@extends('templates.layout')

@section('content')
    <h2> Add New Post </h2>
    <form method="POST" action="/posts">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input name="title" type="text" />
        </div>
        <div>
            <label for="title">Content:</label> 
            <input name="content" type="text" />
        </div>
        <div>
            <button type="submit" />
        </div>
    </form>
@endsection