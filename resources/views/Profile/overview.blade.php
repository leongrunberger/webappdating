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
                    <div class ="text-center">Hey {{Auth::user()->name}}! Willkommen auf deinem Profil!</div>

                <div class="card-body">

                  @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                  </div>
              @endif
              
              @foreach ($profile->all() as $profile)
               
              

              @if($profile->user_id == Auth::user()->id)   
              
              <div class ="text-center">    
              <div class="card-header">Dein Profilbild</div>

              <div class="card-body">
                  
                  
                  <img src="{{asset('uploads/profile/' . $profile->profile_image )}}" style="width: 160px; height: 160px; border-radius: 50%;">

              </div>
            </div>
                                
              

              <div class="card-header">Alter</div>

              <div class="card-body">

                {{$profile->alter}} 

              </div>

              <div class="card-header">Beschreibung</div>

              <div class="card-body">

                {{$profile->beschreibung}} 

              </div>

              <div class="card-header">Wohnort</div>

              <div class="card-body">

                {{$profile->wohnort}} 
                   
              </div>


              <div class ="text-center">   
              <a class="btn btn-light flankr-button" href="{{route('profile.edit', $profile->id)}}" role="button">Profil bearbeiten</a>
              <a class="btn btn-light flankr-button" href="{{route('profile.delete', $profile->id)}}" role="button">Profil löschen</a>
              </div>
              @break
              @endif
              @endforeach
            
              @foreach ($profile->all() as $profile)
                    
              @if($profile->user_id != Auth::user()->id) 
              <div class ="text-center">
              <a class="btn btn-light flankr-button" href="{{route('profile.create', $profile->id)}}" role="button">Erstelle dein Profil</a>
              </div>
              @break
              @endif
              @endforeach 
            
            </div>  
               
            </div>

       
        </div>
    </div>
</div>

<div class="row justify-content-center mt-5">
    <div class="row">
        <!-- include partials.likungser --->
        <!-- buggt aber ------------------->    
    </div>
</div>


@endsection

