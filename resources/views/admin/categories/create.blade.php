@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Nuova categoria</div>

                <div class="card-body">
                    <form action="{{route("admin.categories.store")}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nome categoria</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Inserisci la categoria">
                            {{-- errore validazione --}}
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Aggiungi categoria</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection