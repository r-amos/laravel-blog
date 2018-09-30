@extends('templates.layout')
@section('content')
<div class="tag-content">
    <div class="heading heading__container">
        <h1>Edit Topics.</h1>
    </div>
    <div>
        <h2 class="tag__section-title">New</h2>
        <div class="tag__add">
            <form action="/tags" method="POST">
                @csrf
                <input name="name" class="tag__input" />
                <input type="submit" class="button button--edit" value="Add">
            </form>
        </div>
        <h2 class="tag__section-title">Existing</h2>
        @foreach ($tags as $tag)
            <div class="tag__container">
                <div class="tag__title">
                    <h4>{{ $tag->name }}</h4>
                </div>
                <div class="tag__buttons">
                    <form>
                        <input type="submit" class="button button--edit" value="Edit">
                    </form>
                    <form action="/tags/{{ $tag->name }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="button button--delete" value="Delete">
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection