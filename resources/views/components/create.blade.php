@if(Auth::user() !== null)
<div class="post create-actions">
    <a class="button button--edit" href="/posts/create">Add New</a>
</div>
@endif