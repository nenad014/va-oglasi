@extends('layouts.app')

@section('content')
    <div class="col-md-6 offset-md-3">
        <a href="/oglasi" class="btn btn-outline-danger">Svi oglasi</a>
        <h1 class="text-center">{{ $category->cat_name }}</h1>
        <hr>
        @foreach ($oglasi as $oglas)
        <div class="card">
                
            <div class="card-body">
                <h2 class="text-center">{{$oglas->title}}</h2>
                <a href="/oglasi/{{$oglas->id}}" class="btn btn-info stretched-link text-center">Vidi oglas</a>
            </div>
            <div class="card-footer">
            <button class="btn btn-outline-info">{{$oglas->created_at}}</button> <button class="btn btn-outline-primary float-right">{{$oglas->user->name}}</button>
            </div>
        </div><br>
        @endforeach
    </div>
    
@endsection