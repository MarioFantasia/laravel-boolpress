@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">New Post</div>

                <div class="card-body">
                    <form action="{{route("admin.posts.store")}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Titolo</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Inserisci il titolo">
                            {{-- errore validazione --}}
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="content">Contenuto del post</label>
                            <textarea name="content" class="form-control @error('title') is-invalid @enderror" id="content" placeholder="Inserisci il contenuto del post" rows="5" cols="50"></textarea>
                        </div>
                        {{-- errore validazione --}}
                        @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <button type="submit" class="btn btn-primary">Pubblica post</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection