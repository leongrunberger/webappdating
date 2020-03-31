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
                <div class="card-header">Hey {{Auth::user()->name}}! Willkommen auf deinem Profil!</div>

                <div class="card-body">

                  @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                  </div>
              @endif
              
              @foreach ($profiles->all() as $profiles)
                    
              @if($profiles->user_id == Auth::user()->id)   
              
              <div class="card-header">Name</div>

              <div class="card-body">
                  
                  {{$profiles->user->name}}

              </div>
                  
              

              <div class="card-header">Alter</div>

              <div class="card-body">

                {{$profiles->alter}} 

              </div>

              <div class="card-header">Beschreibung</div>

              <div class="card-body">

                {{$profiles->beschreibung}} 

              </div>

              <div class="card-header">Wohnort</div>

              <div class="card-body">

                {{$profiles->wohnort}} 
                   
              </div>

              <div class="card-header">Lieblingssong</div>

              <div class="card-body">

                {{$profiles->song}} 
                   
              </div>
                  
              <a class="btn btn-primary" href="{{route('profile.edit', $profiles->id)}}" role="button">Profil bearbeiten</a>
              <a class="btn btn-danger" href="{{route('profile.delete', $profiles->id)}}" role="button">Profil löschen</a>
              @break
              @endif
              @endforeach
            
              
              <a class="btn btn-primary" href="{{route('profile.create')}}" role="button">Erstelle dein Profil</a>
            

             @foreach ($profiles->all() as $profiles)
               @if($profiles->user_id != Auth::user()->id)   
              <a class="btn btn-primary" href="{{route('profile.create')}}" role="button">Erstelle dein Profil</a>
              @break
             @endif
             @endforeach 
             
             
                </div>  
               
            </div>

       
    </div>
    </div>
</div>
@endsection
