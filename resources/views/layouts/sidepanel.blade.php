<div class="sidebar">
    <h3 class="sidebar-title"> Topics </h3>
    <nav class="sidebar-navigation">
        <ul>
            @foreach($tags as $tag)
            <li>
                <div class="sidebar-topic__container">
                    <a href="/posts/tags/{{ $tag }}">{{ $tag }}</a>
                </div>
            </li>
            @endforeach
        </ul>
    </nav>
</div>