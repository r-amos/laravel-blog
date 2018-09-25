@if(Auth::user() !== null)
<div>
    <a class="button button--edit" href="/posts/{{ urlencode($post['slug']) }}/edit">Edit</a>
    <form action="/posts/{{ $post->slug }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="button button--delete" type="submit">Delete</button>
    </form>
</div>
@endif