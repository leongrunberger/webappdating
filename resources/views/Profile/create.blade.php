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

@foreach ($profile->all() as $profile)
                    
   @if($profile->user_id == Auth::user()->id)
   
   <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hey {{Auth::user()->name}}! Du hast schon ein Profil!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    <a class="btn btn-light flankr-button" href="{{route('profile.index', $profile->id)}}" role="button">Zurück zum Profil</a>
            </div>

       
    </div>
    </div>
</div>
  @break
  @endif
  @endforeach
   

  @foreach ($profile->all() as $profile)
                    
  @if($profile->user_id != Auth::user()->id) 

  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4 flankr-profile-card">
                <div class="card-header">Hey {{Auth::user()->name}}! Willkommen auf deinem Profil!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('profile.store')}}" method="post">
                       @csrf 
                        <div class="form-group">
                            <label for="exampleInputPassword1">Alter*</label>
                            <input type="text" class="form-control" id="alter" name="alter" placeholder="Wie alt bist du?">
                          </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Beschreibung</label>
                          <textarea type="text" class="form-control" id="beschreibung" name="beschreibung" rows="4" placeholder="Erzähl was über dich"></textarea>
                          
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Wohnort</label>
                          <input type="text" class="form-control" id="wohnort" name="wohnort" placeholder="Wo kommst du her?">
                        </div>

                          <div class="form-group">
                            <label for="exampleInputPassword1">Lieblingssong</label>
                            <input type="text" class="form-control" id="song" name="song"placeholder="Was hörst du gerade?">
                          </div>
                          <div class ="text-center">
                        <button type="submit" class="btn btn-light flankr-button">Profil erstellen</button>
                          </div>
                      </form>
            
            </div>

       
    </div>
    </div>
</div>

@endif
@endforeach
@endsection
