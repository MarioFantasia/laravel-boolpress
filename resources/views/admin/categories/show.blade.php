@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div>
            <div class="card">
                <div class="card-header">Post {{$category["id"]}}</div>

                <div class="card-body">
                    <h1>Categoria: {{$category["name"]}}</h1>
                    <h1>Slug: {{$category["slug"]}}</h1>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection