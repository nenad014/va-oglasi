@extends('layouts.app')

@section('content')
    <h1 class="text-center">POSTAVI OGLAS</h1>
    <div class="col-md-6 offset-md-3">
        <form action="{{ route('oglasi.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="title">Naslov</label>
            <input type="text" name="title" class="form-control" placeholder="Naslov oglasa"><br>
            <label for="category">Kategorija</label>
            <select name="category" class="form-control">
                @foreach ($kategorije as $kat)
            <option class="form-control" value="{{ $kat->id }}">{{ $kat->cat_name }}</option>
                @endforeach
            </select><br>
            <label for="body">Tekst</label>
            <textarea name="body" class="form-control" cols="30" rows="10" placeholder="Tekst oglasa"></textarea><br>
            <label for="image">Slika</label>
            <input type="file" name="image" class="form-control"><br>
            <input type="submit" value="Postavi oglas" class="form-control btn btn-success">
        </form>
    </div>
@endsection