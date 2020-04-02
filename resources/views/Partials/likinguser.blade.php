@extends('profile.overview')

@section('content')
    <h2>Personen, die dich gut finden:</h2>
    <ul>
        @foreach($like as $likeitem)
            <li>{{$likeitem->liked_user_id}}</ul>
        @endforeach
    </ul>
@endsection