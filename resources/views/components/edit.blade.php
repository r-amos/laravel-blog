@if(Auth::user() !== null)
<div class="post edit-actions">
    <form action="/posts/{{ urlencode($post['slug']) }}/edit">
        <input type="submit" class="button button--edit" value="Edit" />
    </form>
    <form action="/posts/{{ $post->slug }}" method="POST">
        @csrf
        @method('DELETE')
        <input class="button button--delete" type="submit" value="Delete" />
    </form>
</div>
@endif