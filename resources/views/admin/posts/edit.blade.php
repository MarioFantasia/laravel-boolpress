@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Modifica Post</div>

                <div class="card-body">
                    <form action="{{route("admin.posts.update", $post["id"])}}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label for="title">Titolo</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Inserisci il titolo" value="{{$post["title"]}}">
                            {{-- errore validazione --}}
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="content">Contenuto del post</label>
                            <textarea name="content" class="form-control @error('title') is-invalid @enderror" id="content" placeholder="Inserisci il contenuto del post" rows="5" cols="50">
                            {{$post["content"]}}
                            </textarea>
                        </div>
                        {{-- errore validazione --}}
                        @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="catetgory">Inserisci la categoria del post</label>
                            <select name="category_id" class="form-control">
                                <option value="">-Seleziona la categoria-</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category["id"]}}">{{ucfirst($category["name"])}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Seleziona i tags</label>
                            @foreach ($tags as $tag)
                                <div class="custom-control custom-checkbox">
                                    <input {{$post["tags"]->contains($tag["id"]) ? "checked" : null }} type="checkbox" name="tags[]" value="{{$tag["id"]}}" id="tag-{{$tag["id"]}}" class="custom-control-input"> {{-- name="tags[]" vale solo con le checkbox --}}
                                    <label for="tag-{{$tag["id"]}}" class="custom-control-label">{{$tag["name"]}}</label>
                                </div>
                            @endforeach
                        </div>

                        <button type="submit" class="btn btn-primary">Pubblica post</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection