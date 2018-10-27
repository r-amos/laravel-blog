@extends('templates.layout')
@section('content')
<div class="tag-content">
    <div class="heading heading__container">
        <h1>Edit Tags.</h1>
    </div>
    <div>
        <div class="tag__add">
            <form action="/tags" method="POST">
                @csrf
                <input name="name" class="tag__input" />
                <input type="submit" class="button button--edit" value="Add">
            </form>
        </div>
        @foreach ($tags as $tag)
            <div class="tag__container tag__container--spaced">
                <div class="tag__title">
                    <p>{{ $tag->name }}</p>
                </div>
                <div class="tag__buttons">
                    <form action="/tags/{{ $tag->name }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="button button--delete" value="Delete">
                    </form>
                    <form action="/tags/{{ $tag->name }}/edit" method="GET">
                        @method('EDIT')
                        @csrf
                        <input type="submit" class="button button--edit" value="Edit">
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection