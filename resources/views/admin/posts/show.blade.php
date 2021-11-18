@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div>
            <div class="card">
                <div class="card-header">Post {{$post["id"]}}</div>

                <div class="card-body">
                    <h1>Titolo: {{$post["title"]}}</h1>
                    @if ($post["tags"])
                        <ul style="list-style: none">
                            <li><h4>Tag: </h4></li>
                            @foreach ($post["tags"] as $tag)
                                <li>{{$tag["name"]}} </li>
                            @endforeach
                        </ul>
                    @endif
                    <div>Data: {{$post["created_at"]}}</div>
                    <p>{{$post["content"]}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection