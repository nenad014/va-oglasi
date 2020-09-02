@extends('layouts.app')

@section('content')
    <div class="col-md-6 offset-md-3">
    <a href="/oglasi" class="btn btn-outline-danger">Svi oglasi</a>
    <h1 class="text-center">{{$oglas->title}}</h1>
    
        <p class="text-justify">{{$oglas->body}}</p>
        <img src="/storage/images/{{$oglas->image}}" width="100%">
        <hr>
        @if (!Auth::guest())
            @if (Auth::user()->id == $oglas->user_id)
                <a href="/oglasi/{{$oglas->id}}/edit" class="btn btn-warning float-left">Uredi</a>
                <form action="/oglasi/{{$oglas->id}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger float-right">Ukloni</button>
                </form>
                <br>
            @endif
        @endif
        <br>
        <button class="btn btn-outline-info">{{$oglas->created_at}}</button> <button class="btn btn-outline-primary float-right">{{$oglas->user->name}}</button>
    </div>
@endsection