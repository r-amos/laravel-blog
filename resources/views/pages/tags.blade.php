@extends('templates.layout')
@section('content')
<div class="tag-content">
    <div class="heading heading__container">
        <h1>Tags.</h1>
    </div>
    <div>
        @foreach ($tags as $tag)
            <div class="tag__container">
                <h3 class="tag__title">{{ $tag->name }}</h3>
                <form>
                    <input type="submit" class="button button--edit" value="Edit">
                </form>
                 <form>
                    <input type="submit" class="button button--delete" value="Delete">
                </form>
            <div>
        @endforeach
    </div>
</div>
@endsection