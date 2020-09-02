@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3">
        <H3>KATEGORIJE</H3>
        <hr>
        <ul class="nav flex-column">
            @foreach ($kategorije as $kat)
                <li class="nav-item">
                <a href="kategorije/{{$kat->id}}" class="nav-link">{{$kat->cat_name}}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="col-md-6">
        <h1 class="text-center">SVI OGLASI</h1>
        @if (count($oglasi) > 0)
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
            {{$oglasi->links()}}
        @else
            <p>Nema oglasa</p>
        @endif
    </div>
    <div class="col-md-3">
        <h3>Najnoviji oglasi</h3>
        <hr>
        <ul class="list-group">
        @foreach ($latest as $item)
            <li class="list-group-item"><a href="/oglasi/{{ $item->id }}">{{ $item->title }}</a></li>
        @endforeach
        </ul>
    </div>
</div>
@endsection