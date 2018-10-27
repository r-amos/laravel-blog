<div class="sidebar">
    <h3 class="sidebar-title"> Tags </h3>
    <nav class="sidebar-navigation">
        <ul>
            @foreach($tags as $tag)
            <li>
                <div class="sidebar-tag__container">
                    <a href="/posts/tags/{{ $tag }}">{{ $tag }}</a>
                </div>
            </li>
            @endforeach
        </ul>
    </nav>
</div>