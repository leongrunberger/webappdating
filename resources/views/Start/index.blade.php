@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Nutzer</h1>
            @if(count($users) > 1)
                @foreach($users as $user)


                    <div class="card mt-2 flankr-profile-card">
                        <div class="card-body">

                            <div class="flankr-profile-card-img">img</div>

                            <!-- avatar
                            <img src="{{ asset($user->avatar) }}" alt="" />
                            -->
                            
                            <h4 class="mt-2">
                                {{$user->name}}
                            </h4>
                            <p>
                                <small>Alter: {{$user->date}}</small><br>
                            </p>

                            
                            <button>
                                Dislike
                            </button>
                            <button>
                                Like
                            </button>

                        </div>
                    </div>

                @endforeach

                @else
                    <p>No Users found</p>
                @endif

        </div>
    </div>
</div>



@endsection
