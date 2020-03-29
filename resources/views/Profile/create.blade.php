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

                        <button type="submit" class="btn btn-primary">Profil erstellen</button>
                      </form>
            
            </div>

       
    </div>
    </div>
</div>
@endsection
