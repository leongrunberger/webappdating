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
              
              <table class="table table-bordered table-striped">
                    @foreach ($profiles->all() as $profiles)
                        <tr>
                            <td>{{$profiles->user_id}}</td>
                            <td>{{$profiles->name}}</td>
                            <td>{{$profiles->alter}}</td>
                            <td>{{$profiles->wohnort}}</td>
                            <td>{{$profiles->beschreibung}}</td>
                        </tr>
                    @endforeach
              </table>  

              <a class="btn btn-primary" href="{{route('profile.create')}}" role="button">Profil bearbeiten</a>
              

                </div>  
               
            </div>

       
    </div>
    </div>
</div>
@endsection
