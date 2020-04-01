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
                <div class="card-header">Hey {{Auth::user()->name}}! Bearbeite dein Profil!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('profile.update', $profile->id)}}" method="post">
                       @csrf 

                       @method('PUT')

                    
                    <div class="form-group">
                      <label for="exampleInputPassword1">Alter</label>
                      <input type="text" class="form-control{{$errors->has('alter') ? ' is-invalid' : ''}}" id="alter" name="alter" value="{{old('alter') ?? $profile->alter ?? ''}}" placeholder="Wie alt bist du?">
                    </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Beschreibung</label>
                          <textarea type="text" class="form-control{{$errors->has('beschreibung') ? ' is-invalid' : ''}}" id="beschreibung" name="beschreibung" rows="4" placeholder="Erzähl was über dich">{{old('beschreibung') ?? $profile->beschreibung ?? ''}}</textarea>
                          
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Wohnort</label>
                          <input type="text" class="form-control{{$errors->has('wohnort') ? ' is-invalid' : ''}}" id="wohnort" name="wohnort" value="{{old('wohnort') ?? $profile->wohnort ?? ''}}" placeholder="Wo kommst du her?">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Lieblingssong</label>
                            <input type="text" class="form-control{{$errors->has('song') ? ' is-invalid' : ''}}" id="song" name="song" value="{{old('song') ?? $profile->song ?? ''}}" placeholder="Wo hörst du gerade?">
                          </div>
                        
                          <div class ="text-center">
                            <button type="submit" class="btn btn-light flankr-button">Profil bearbeiten</button>
                          
                          </div>
                        
                    </div>
                        
                      </form>
            
                    </div>

                    </div>

       
    </div>
    </div>
</div>
@endsection
