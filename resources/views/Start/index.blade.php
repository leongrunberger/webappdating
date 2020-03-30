@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Deine Beute</h1>
            @if(count($profiles) > 1)
                @foreach($profiles as $profile)


                    <div class="card mt-4 flankr-profile-card">
                        <div class="card-body text-center">

                            <div class="flankr-profile-card-img">img</div>

                            <!-- avatar
                            <img src="{{ asset($profile->avatar) }}" alt="" />
                            -->
                            
                            <h4 class="mt-2">
                                {{$profile->name}}
                            </h4>
                            <p>
                                Sucht {{$profile->lgender}}
                            </p>
                            <p>
                                {{$profile->alter}} Jahre alt
                            </p>
                            <p>
                                {{$profile->wohnort}}
                            </p>
                            <p>
                                {{$profile->beschreibung}}
                            </p>

                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-light flankr-button">Dislike</button>
                                <button type="button" class="btn btn-light flankr-button ml-2">Like</button>
                            </div>

                        </div>
                    </div>

                @endforeach

                @else
                    <p>Keine Beute verfügbar.</p>
                @endif

        </div>
    </div>
</div>



@endsection
