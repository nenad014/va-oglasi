@extends('layouts.app')

@section('content')
    <h1 class="text-center">{{$title}}</h1>
    <div class="col-md-6 offset-md-3">
        <form action="#" method="post">
            @csrf
            <label for="name">Ime</label>
            <input type="text" name="name" class="form-control" placeholder="Vaše ime" required><br>
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Vaša email adresa"><br>
            <label for="subject">Predmen</label>
            <input type="text" name="subject" class="form-control" placeholder="Unesite naslov Vaše poruke" required><br>
            <label for="message">Poruka</label>
            <textarea name="message" id="" cols="30" rows="10" class="form-control" placeholder="Vaša poruka" required></textarea><br>
            <input type="submit" class="btn btn-primary" name="sendMsg" value="Pošalji">
        </form>
    </div>
@endsection