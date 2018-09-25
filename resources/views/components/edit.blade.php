@if(Auth::user() !== null)
<div>
    <a class="button button--edit" href="/posts/{{ urlencode($post['slug']) }}/edit">Edit</a>
    <a class="button button--delete" href="">Delete</a>
</div>
@endif