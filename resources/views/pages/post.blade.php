@extends('templates.layout')
@section('title', $post->title)
@section('description', $post->description)
@section('content')
<div class="post">
        <div class="title">
            <h1>{{$post->title}}</h1>
            <div class="sub-heading">
                {{$post->formattedDate()}}
            </div>
            @include('components.tags', ['tags' => $post->tags])
        </div>
        <div class="post-content">
            <p class="summary">
                {{ $post->description }}
            </p>
            {!! $post->content !!}
            @include('components.edit')
        </div>
</div>
<div class="post-content" id="disqus_thread"></div>
<script>
/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

var disqus_config = function () {
this.page.url =  <?= "'" . url()->current() . "'"  ?>; // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = <?= "'" . url()->current() . "'"  ?>;// Replace PAGE_IDENTIFIER with your page's unique identifier variable
};

(function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://amoose.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
@endsection