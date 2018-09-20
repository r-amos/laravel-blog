<div class="sidebar">
    <h3 class="sidebar-title"> Topics </h3>
    <nav class="sidebar-navigation">
        <ul>
            @foreach($tags as $tag)
            <li><a href="/posts/tags/{{ $tag }}">{{ $tag }}</a></li>
            @endforeach
        </ul>
    </nav>
</div>