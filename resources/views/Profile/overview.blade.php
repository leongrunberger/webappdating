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
              
              @foreach ($user->all() as $user)
                    
              @if($user->id == Auth::user()->id)   
              
              <div class="card-header">Name</div>

              <div class="card-body">
                  
                  {{$user->name}}

              </div>
                  
              

              <div class="card-header">Geburtstag</div>

              <div class="card-body">

                {{$user->date}} 

              </div>

              <div class="card-header">Beschreibung</div>

              <div class="card-body">

                {{$user->beschreibung}} 

              </div>

              <div class="card-header">Wohnort</div>

              <div class="card-body">

                {{$user->wohnort}} 
                   
              </div>


                  
              <a class="btn btn-primary" href="{{route('profile.edit', $user->id)}}" role="button">Profil bearbeiten</a>
              <a class="btn btn-danger" href="{{route('profile.delete', $user->id)}}" role="button">Profil löschen</a>
              @break
              @endif
              @endforeach
            
              

                </div>  
               
            </div>

       
    </div>
    </div>
</div>
@endsection
