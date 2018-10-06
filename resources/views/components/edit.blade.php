@if(Auth::user() !== null)
<div class="post edit-actions">
    <form method="POST" action="/posts/{{ urlencode($post['slug']) }}/edit">
        @method('GET')
        <input type="submit" class="button button--edit" value="Edit" />
    </form>
    <form method="POST" action="/posts/{{ $post->slug }}" >
        @csrf
        @method('DELETE')
        <input class="button button--delete" type="submit" value="Delete" />
    </form>
</div>
@endif