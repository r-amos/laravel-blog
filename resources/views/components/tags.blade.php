<div class="tag__container">
    @foreach($tags as $tag)
        <a href="/posts/tags/{{ $tag['name'] }}" class="tag tag--{{strtolower($tag['name'])}}">
            {{ $tag['name'] }}
        </a>
    @endforeach
</div>