@extends('layouts.profil')

@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $message) 
            <li>{{$message}}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hey {{Auth::user()->name}}! Willst du dein Profil wirklich löschen?</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('profile.destroy', $profile->id)}}" method="post">
                       @csrf 

                       @method('DELETE')
                       
                        <button type="submit" class="btn btn-danger">Profil löschen</button>
                        <a class="btn btn-primary" href="{{route('profile.index')}}" role="button">Weiter Flanken</a>
                      </form>
            
            </div>

       
    </div>
    </div>
</div>
@endsection
