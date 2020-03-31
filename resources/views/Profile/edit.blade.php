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
                <div class="card-header">Hey {{Auth::user()->name}}! Bearbeite dein Profil!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('profile.update', $user->id)}}" method="post">
                       @csrf 

                       @method('PUT')


                        <div class="form-group">
                          <label for="exampleInputEmail1">Beschreibung</label>
                          <textarea type="text" class="form-control{{$errors->has('beschreibung') ? ' is-invalid' : ''}}" id="beschreibung" name="beschreibung" rows="4" placeholder="Erzähl was über dich">{{old('beschreibung') ?? $user->beschreibung ?? ''}}</textarea>
                          
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Wohnort</label>
                          <input type="text" class="form-control{{$errors->has('wohnort') ? ' is-invalid' : ''}}" id="wohnort" name="wohnort" value="{{old('wohnort') ?? $user->wohnort ?? ''}}" placeholder="Wo kommst du her?">
                        </div>



                        <button type="submit" class="btn btn-primary">Profil speichern</button>
                      </form>
            
            </div>

       
    </div>
    </div>
</div>
@endsection
