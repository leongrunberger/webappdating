@extends('layouts.app')

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
            <div class="card mt-4 flankr-profile-card">
                <div class="card-header">
                <div class ="text-center">Hey {{Auth::user()->name}}! Willst du dein Profil wirklich löschen?</div></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('profile.destroy', $profile->id)}}" method="post">
                       @csrf 

                       @method('DELETE')
                       <div class ="text-center">
                        <button type="submit" class="btn btn-light flankr-button">Profil löschen</button>
                        <a class="btn btn-light flankr-button" href="{{route('profile.index')}}" role="button">Weiter Flanken</a>
                       </div>
                    </form>
            
            </div>

       
    </div>
    </div>
</div>
@endsection
