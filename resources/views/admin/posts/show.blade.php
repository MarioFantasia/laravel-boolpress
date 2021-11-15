@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div>
            <div class="card">
                <div class="card-header">Post {{$post["id"]}}</div>

                <div class="card-body">
                    <h1>Titolo: {{$post["title"]}}</h1>
                    <p>{{$post["content"]}}</p>
                    <div>Data: {{$post["created_at"]}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection