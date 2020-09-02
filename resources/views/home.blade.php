@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <a href="/oglasi/create" class="btn btn-primary form-control">Dodaj oglas</a>
                    @if (count($oglasi) > 0)
                        <h3 class="text-center">Vaši oglasi</h3>
                        <table class="table table-tripped">
                            <tr>
                                <th>Naslov</th>
                                <th>Akcija</th>
                            </tr>
                            @foreach ($oglasi as $oglas)
                                <tr>
                                    <td>{{ $oglas->title }}</td>
                                    <td>
                                        <a href="/oglasi/{{$oglas->id}}/edit" class="btn btn-warning float-left">Uredi</a>
                                        <form action="/oglasi/{{$oglas->id}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger float-right">Ukloni</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>Nemate postavljenih oglasa</p>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
