<div class="topic__container">
    @foreach($post['tags'] as $tag)
        <a href="/posts/tags/{{ $tag['name'] }}" class="topic topic--{{strtolower($tag['name'])}}">
            {{ $tag['name'] }}
        </a>
    @endforeach
</div>