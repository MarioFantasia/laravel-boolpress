@extends('layouts.guest')

@section('pageContent')

<h2>{{ucfirst( $post["title"])}}</h2>
<p>{{$post["content"]}}</p>
<div>{{$post->created_at->diffForHumans()}} by Mario</div>

@endsection


{{-- <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
        <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
        <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
        <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
    </div>
</div>

<div class="row g-5">
    <div class="col-md-8">
        @foreach ($posts as $post)
        <article class="blog-post">
            <h2 class="blog-post-title">{{$post["title"]}}</h2>
            <div class="blog-post-meta">{{$post->created_at->diffForHumans()}} <a href="#">Mario</a></div>
            <p>{{substr($post["content"], 0, 200)}}...</p>
        </article>
        @endforeach
    </div>

    <div class="col-md-4">
        <div class="position-sticky" style="top: 2rem;">
            <div class="p-4">
                <h4 class="fst-italic">Elsewhere</h4>
                <ol class="list-unstyled">
                    <li><a href="#">GitHub</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Facebook</a></li>
                </ol>
            </div>
        </div>
    </div>
</div> --}}