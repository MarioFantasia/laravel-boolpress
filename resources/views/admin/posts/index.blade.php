@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div>
            <div class="card">
                <div class="card-header">Tutti i posts</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Category</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{$post["id"]}}</td>
                                <td>{{$post["title"]}}</td>
                                <td>{{$post["slug"]}}</td>
                                <td>{{$post["category"]["name"] ?? "" }}</td>
                                <td>
                                    <a href="{{route("admin.posts.show", $post["id"])}}">
                                        <button type="button" class="btn btn-primary">Visualizza</button>
                                    </a>
                                    <a href="{{route("admin.posts.edit", $post["id"])}}">
                                        <button type="button" class="btn btn-success">Modifica</button>
                                    </a>
                                    <a href="">
                                        <form action="{{route("admin.posts.destroy", $post["id"])}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger">Elimina</button>
                                        </form>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection