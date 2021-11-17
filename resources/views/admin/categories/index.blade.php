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
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{$category["id"]}}</td>
                                <td>{{$category["name"]}}</td>
                                <td>{{$category["slug"]}}</td>
                                <td>
                                    <a href="{{route("admin.categories.show", $category["id"])}}">
                                        <button type="button" class="btn btn-primary">Visualizza</button>
                                    </a>
                                    <a href="{{route("admin.categories.edit", $category["id"])}}">
                                        <button type="button" class="btn btn-success">Modifica</button>
                                    </a>
                                    <a href="">
                                        <form action="{{route("admin.categories.destroy", $category["id"])}}" method="POST">
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